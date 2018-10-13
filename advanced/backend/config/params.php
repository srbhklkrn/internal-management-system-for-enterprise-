<?php
return [
    'adminEmail' => 'admin@example.com',
];

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/uploads/room_img/';
Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/uploads/room_img/';

