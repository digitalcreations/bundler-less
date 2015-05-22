<?php

namespace DC\Bundler\Less;

class LessTransformer implements \DC\Bundler\ITransformer {

    /**
     * @inheritdoc
     */
    function getName()
    {
        return "less";
    }

    /**
     * @inheritdoc
     */
    function transform(\DC\Bundler\Content $content, $file = null)
    {
        $parser = new \Less_Parser();
        if ($file != null) {
            $parser->parseFile($file, '');
        }
        else {
            $parser->parse($content->getContent());
        }
        return new \DC\Bundler\Content($this->getOutputContentType(), $parser->getCss());
    }

    /**
     * @inheritdoc
     */
    function getOutputContentType()
    {
        return "text/css";
    }

    /**
     * @inheritdoc
     */
    function runInDebugMode()
    {
        return true;
    }


    public static function registerWithContainer(\DC\IoC\Container $container) {
        $container
            ->register('\DC\Bundler\Less\LessTransformer')
            ->to('\DC\Bundler\ITransformer');
    }
}