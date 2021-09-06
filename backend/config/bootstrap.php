<?php


/* ADDITIONAL ALIAS */
Yii::setAlias('modules', dirname(dirname(__DIR__)) . '/modules');
Yii::setAlias('widgets', dirname(dirname(__DIR__)) . '/widgets');
Yii::setAlias('themes', dirname(dirname(__DIR__)) . '/themes');
Yii::setAlias('public', dirname(dirname(__DIR__)) . '/public');
Yii::setAlias('@root', realpath(dirname(__FILE__).'/../../'));
Yii::setAlias('@bentraytech/sms', dirname(dirname(__DIR__)) . '/common/modules/bentraytech/yii2-generic-sms-module/src');
