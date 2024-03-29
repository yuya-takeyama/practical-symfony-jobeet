<div id="jobs">
  <?php foreach ($categories as $category): ?>
    <div class="category_<?php echo Jobeet::slugify($category->getName()) ?>">
      <div class="category">
        <div class="feed">
          <a href="">Feed</a>
        </div>
        <h1><?php echo link_to($category, 'category', $category) ?></h1>
      </div>

      <?php include_partial('job/list', array(
          'jobs' => $category->getActiveJobs(sfConfig::get('app_max_jobs_on_homepage'))
      )) ?>
    </div>
  <?php endforeach; ?>
</div>
