<?php

namespace Creativestyle\ContentConstructorAdminExtension\DataProviders;

class CmsTeaserAdminDataProvider implements \Creativestyle\ContentConstructor\Components\CmsTeaser\CmsTeaserAdminDataProvider
{
    /**
     * @var \Creativestyle\CmsTagManagerExtension\Api\TagsRepositoryInterface
     */
    private $tagsRepository;

    public function __construct(\Creativestyle\CmsTagManagerExtension\Api\TagsRepositoryInterface $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getTags() {
        $tags = [];

        $allTags = $this->tagsRepository->getAllTags();

        foreach ($allTags as $tag) {
            $tags[] = [
                'label' => $tag,
                'value' => $tag,
                'is_active' => '1'
            ];
        }

        $data = [];
        $data['optgroup'] = $tags;

        return $data;
    }

}