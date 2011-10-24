<?php
// $Id: user-profile.tpl.php,v 1.2.2.2 2009/10/06 11:50:06 goba Exp $

/**
 * @file user-profile.tpl.php
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * By default, all user profile data is printed out with the $user_profile
 * variable. If there is a need to break it up you can use $profile instead.
 * It is keyed to the name of each category or other data attached to the
 * account. If it is a category it will contain all the profile items. By
 * default $profile['summary'] is provided which contains data on the user's
 * history. Other data can be included by modules. $profile['user_picture'] is
 * available by default showing the account picture.
 *
 * Also keep in mind that profile items and their categories can be defined by
 * site administrators. They are also available within $profile. For example,
 * if a site is configured with a category of "contact" with
 * fields for of addresses, phone numbers and other related info, then doing a
 * straight print of $profile['contact'] will output everything in the
 * category. This is useful for altering source order and adding custom
 * markup for the group.
 *
 * To check for all available data within $profile, use the code below.
 * @code
 *   print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>';
 * @endcode
 *
 * Available variables:
 *   - $user_profile: All user profile data. Ready for print.
 *   - $profile: Keyed array of profile categories and their items or other data
 *     provided by modules.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 */
?>
<div class="profile">
<?php
profile_load_profile($account);
// now you can call the profile field like profile_firstname
?>
<?php print theme('user_picture', $account); ?>

<h2><?php print check_plain($account->profile_name);?></h2>

<div class="fields"><?php print check_plain($account->profile_place); ?> (<?php print check_plain($account->profile_location); ?>)</div>

<?php if($account->profile_linkedin or $account->profile_twitter):  ?>
<div class="fields">
  <table>
    <tr>
      <?php if($account->profile_linkedin): ?>
      <td><a href="<?php print check_url($account->profile_linkedin); ?>"><img src="http://www.linkedin.com/img/webpromo/btn_viewmy_160x25.png" width="160" height="25" border="0" alt="Visit <?php print check_plain($account->profile_name); ?>s profile on LinkedIn" /></a></td>
      <?php endif; ?>

      <?php if($account->profile_twitter): ?>
      <td><a href="<?php print check_url($account->profile_twitter); ?>"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-b.png" alt="Follow <?php print check_plain($account->profile_name); ?> on Twitter" /></a></td>
      <?php endif; ?>
    </tr>
  </table>
</div>
<?php endif; ?>

<?php if($account->profile_drucontrib or $account->profile_drucontribmodules or $account->profile_drucontribtheme or $account->profile_drucontriblocale or $account->profile_drupalservice or $account->profile_drusupport or $account->profile_drupalcon-antwerp or  $account->profile_drupalcon-brussels or $account->profile_drupalcon-barcelona or $account->profile_drupalcon-szeged or $account->profile_drupalcon-paris or $account->profile_drupalcon-copenhagen):  ?>
<h2 style="clear:both">Drupal</h2>

<div class="fields">

<?php if($account->profile_drucontrib): ?>
<div><?php print check_markup($account->profile_drucontrib); ?></div>
<?php endif ?>

<ul> 
<?php if ($account->profile_drucontribmodules == '1'): ?>
<li>I have contributed to module developement.</li>
<?php endif ?>
 
<?php if ($account->profile_drucontribtheme == '1'): ?>
<li>I have contributed to theme developement.</li>
<?php endif ?>

<?php if ($account->profile_drucontriblocale == '1'): ?>
<li>I have contributed to translation projects</li>
<?php endif ?>
 
<?php if ($account->profile_drupalservice == '1'): ?>
<li>I offer Drupal related services.</li>
<?php endif ?>
 
<?php if ($account->profile_drusupport == '1'): ?>
<li>I help in the support forums.</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconantwerp == '1'): ?>
<li>I attended DrupalCon Antwerp 2005 FOSDEM</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconbrussels == '1'): ?>
<li>I attended DrupalCon Brussels 2006</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconbarcelona == '1'): ?>
<li>I participated on DrupalCon Barcelona 2007</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconszeged == '1'): ?>
<li>I attended DrupalCon Szeged, Hungary 2008</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconparis == '1'): ?>
<li>I attended DrupalCon Paris 2009</li>
<?php endif ?>
 
<?php if ($account->profile_drupalconcopenhagen == '1'): ?>
<li>I attended DrupalCon Copenhagen 2010</li>
<?php endif ?>

<?php if ($account->profile_drupalconlondon == '1'): ?>
<li>I attended DrupalCon London 2011</li>
<?php endif ?>

</ul>
</div>
<?php endif; ?>




</div>
