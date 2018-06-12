<?php

namespace Creativestyle\ContentConstructorAdminExtension\DataProviders;

class CategoryPickerDataProvider
{
    /**
     * @var \Creativestyle\ContentConstructorFrontendExtension\DataProviders\NavigationDataProvider
     */
    private $navigationDataProvider;

    public function __construct(\Creativestyle\ContentConstructorFrontendExtension\DataProviders\NavigationDataProvider $navigationDataProvider)
    {
        $this->navigationDataProvider = $navigationDataProvider;
    }

    public function getCategories($rootCategoryId) {
        $categories = $this->navigationDataProvider->getNavigationStructure($rootCategoryId, false);

        $modifiedCategories['optgroup'] = $categories['items'];

        $this->modifyKeys($modifiedCategories['optgroup']);

        return $modifiedCategories;
    }

    public function modifyKeys(&$categories) {
        foreach($categories as &$category) {
            $category['value'] = $category['id'];
            unset($category['id']);
            unset($category['hasChildren']);

            if(isset($category['subcategories'])) {
                $category['optgroup'] = $category['subcategories'];
                unset($category['subcategories']);

                $this->modifyKeys($category['optgroup']);
            }
        }
    }
}