<?php
    slot('title', sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition()))
?>
<?php use_stylesheet('job.css') ?>
<?php use_helper('Text') ?>

<div id="job">
  <h1><?php echo $job->getCompany() ?></h1>
  <h2><?php echo $job->getLocation() ?></h2>
  <h3>
    <?php echo $job->getPosition() ?>
    <small> - <?php echo $job->getType() ?></small>
  </h3>

  <?php if ($job->getLogo()): ?>
    <div class="logo">
      <a href="<?php echo $job->getUrl() ?>">
        <img src="/uploads/jobs/<?php echo $job->getLogo() ?>"
          alt="<?php echo $job->getCompany() ?> logo" />
      </a>
    </div>
  <?php endif ?>

  <div class="description">
    <?php echo simple_format_text($job->getDescription()) ?>
  </div>

  <h4>How to apply?</h4>

  <p class="how_to_apply"><?php echo $job->getHowToApply() ?></p>

  <div class="meta">
    <small>posted on <?php echo $job->getDateTimeObject('created_at')->format('m/d/Y') ?></small>
  </div>

  <div style="padding: 20px 0">
    <a href="<?php echo url_for('job/edit?id='.$job->getId()) ?>">
      Edit
    </a>
  </div>
</div>
