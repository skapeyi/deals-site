<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->email) ?>,</p>

    <p>Follow the link below to reset your password:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

    <p>Regards <br />DoneDeal Support <br /> Email: help@donedeal.ug, Telephone: 0200 905 030 <br />
    <img src="https://ci5.googleusercontent.com/proxy/Qtve9mw1vFQXy5RUfO7ZNRuRYXwcTkGIDFAMEeyj81jJutfRa_bbGBabEVEarNdmeUE=s0-d-e1-ft#http://donedeal.ug/email.png"/>

</div>
