<?php


namespace gamma\useCases;


use gamma\entity\User;
use gamma\helpers\ArrayHelper;
use WPDO\db\DB;

class UserFactory {

	private static  $instance= null;

	public static function getInstance(): UserFactory
	{
		if (static::$instance === null) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * @param $wpUser \WP_User object or integer
	 * @return User
	 */
	public function create($wpUser): User
	{
		return (new User($wpUser));
	}

	public function getUsers($args = []): array
	{
		$users = get_users($args);
		return $this->convertUsers($users);
	}

	public function convertUsers(array $users): array
	{
		$gammaUsers = [];

		foreach ($users as $user){
			$gammaUsers[] = $this->create($user);
		}

		return $gammaUsers;
	}

	public function getGroupUserTeam()
	{
		$users = $this->getUsers([
			'orderby' => 'meta_value',
			'meta_key' => 'last_name',
			'meta_query' => [
				[
					'key' => 'group',
					'value' => 'team',
					'compare' => 'LIKE'
				],
			]
		]);

		$pluginDb = new DB();

		$departments = $pluginDb->getDepartments();
		$groups = [];

		foreach ( $departments as $department ) {
			$groups[$department['name']] = [];
			if (isset($department['teams']) && !empty($department['teams'])){

				foreach ( $department['teams'] as $team ){
					$groups[$department['name']][$team['tm_name']] = [];
					foreach ($users as $user ) {
						if($user->department == $department['name'] && $user->team_name == $team['tm_name'])
							$groups[$department['name']][$team['tm_name']][] = $user;
					}

				}
			}
		}

		/*foreach ($users as $user ) {
			if(!$user->group)
				continue;

			if(isset($groups[$user->department])){
				if(isset($groups[$user->department][$user->team_name]))
					$groups[$user->department][$user->team_name][] = $user;
				else
					$groups[$user->department][$user->team_name] = [$user];
			}
			else{
				$groups[$user->department] = [$user->team_name => [$user]];
			}

		}*/

		return $this->orderTeam($groups);
	}

	/**
	 * @return array
	 */
	public function getGroupUserLeadership()
	{
		$users = $this->getUsers([
			'orderby' => 'meta_value',
			'meta_key' => 'last_name',
			'meta_query' => [
				'group' => [
					'key' => 'group',
					'value' => 'leadership',
					'compare' => 'LIKE'
				],
			]
		]);

		return $this->orderLeadership($users);
	}


	/**
	 * Order by custom fields
	 * @param array $users
	 */
	public function orderTeam(array $groups)
	{
		$orderedGroups = [];
		foreach ($groups  as $departmentName => $group ) {
			if(!isset($orderedGroups[$departmentName]))
				$orderedGroups[$departmentName] = [];

			foreach ( $group as $teamName => $team ) {
				ArrayHelper::multisort($team, 'order_team');
				$orderedGroups[$departmentName][$teamName] = $team;
			}
		}

		return $orderedGroups;
	}


	/**
	 * Order by custom fields
	 * @param array $users
	 */
	public function orderLeadership(array $users)
	{
		ArrayHelper::multisort($users, 'order_leadership');

		return $users;
	}
}
