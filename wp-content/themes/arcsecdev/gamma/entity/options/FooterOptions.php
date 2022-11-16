<?php

namespace gamma\entity\options;


class FooterOptions extends BaseOptions
{
	public function getLogoUrl(): string
	{
		$logoUrl = $this->getField('footer_logo');

		return $logoUrl;
	}


	public function getSocialLinks(): array
	{
		$links = [];
		$socialLinks =  get_field('footer_social_links', 'option');

		if(count($socialLinks)){
			foreach ($socialLinks as $socialLink) {
				$links[$socialLink['acf_fc_layout']] = $socialLink['link'];
			}
		}
		return $links;
	}


	public function getDisclaimer()
	{
		///$disclaimer = $this->getField('disclaimer');
		$disclaimer = get_field('disclaimer', 'option');

		return $disclaimer;
	}
	public function getButtons(): array
	{
		$buttons = [];
		$buttonsData = get_field('buttons', 'option');
		foreach ($buttonsData as $item) {
			$buttons[] = [
				'title' => $item['button']['title'],
				'url' => $item['button']['url'],
				'target' => $item['button']['target']
			];
		}
		return $buttons;
	}
}
