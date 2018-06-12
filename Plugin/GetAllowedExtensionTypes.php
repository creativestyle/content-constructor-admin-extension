<?php
namespace Creativestyle\ContentConstructorAdminExtension\Plugin;

class GetAllowedExtensionTypes
{
    public function afterGetAllowedExtensions(\Magento\Theme\Model\Design\Backend\Logo $subject, $result)
    {
        $result[] = 'svg';
        return $result;
    }
}