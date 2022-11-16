<?php

namespace gamma\gutenberg\block\library;


class FlexibleSpacer extends BaseLibraryGutenbergBlock
{
    protected function getName(): string { return 'flexible_spacer'; }

    protected function getTitle(): string { return 'Flexible Spacer'; }

    protected function getDescription(): string { return 'Flexible Spacer'; }

    protected function getPreview(): string { return 'default.jpg'; }

    protected function getIcon(): string { return '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M12.5 4.2v1.6h4.7L5.8 17.2V12H4.2v7.8H12v-1.6H6.8L18.2 6.8v4.7h1.6V4.2z"></path></svg>'; }

}

