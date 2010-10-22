<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<style type="text/css">
.limit {
    float: left;
    margin-bottom: 10px;
    background: #F8F8F8;
    height: 30px;
    width: 60%;
}
.limit .div1 {
    float: left;
    margin-left: 5px;
    padding-top: 7px;
    padding-left: 3px;
}
.limit .div2 {
    float: left;
    text-align: left;
    padding-top: 7px;
    padding-left: 7px;
}
.limit select {
    font-size: 11px;
    margin: 0;
    padding: 0;
}
.sort {
    float: right;
    margin-bottom: 10px;
    background: #F8F8F8;
    height: 30px;
    width: 40%;
}
.sort .div1 {
    float: left;
    margin-left: 5px;
    padding-top: 7px;
    padding-left: 3px;
}
.sort .div2 {
    float: left;
    text-align: left;
    padding-top: 7px;
    padding-left: 7px;
}
select {
    font-size: 11px;
    margin: 0;
    padding: 0;
}
</style>
<div id="content">
  <div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
      <h1><?php echo $heading_title; ?></h1>
    </div>
  </div>
  <div class="middle">
  <div class="limit">
    <div class="div2"><?php echo $text_limit; ?></div>
    <div class="div1">
      <select name="limit" onchange="location=this.value">
        <?php foreach ($limits as $l) { ?>
        <?php if (($limit) == $l['value']) { ?>
        <option value="<?php echo $l['href']; ?>" selected="selected"><?php echo $l['text']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $l['href']; ?>"><?php echo $l['text']; ?></option>
        <?php } ?>
        <?php } ?>
      </select>
    </div>
  </div>
    <div class="sort">
      <div class="div2"><?php echo $text_sort; ?></div>
      <div class="div1">
        <select name="sort" onchange="location = this.value">
          <?php foreach ($sorts as $sorts) { ?>
          <?php if (($sort . '-' . $order) == $sorts['value']) { ?>
          <option value="<?php echo str_replace('&', '&amp;', $sorts['href']); ?>" selected="selected"><?php echo $sorts['text']; ?></option>
          <?php } else { ?>
          <option value="<?php echo str_replace('&', '&amp;', $sorts['href']); ?>"><?php echo $sorts['text']; ?></option>
          <?php } ?>
          <?php } ?>
        </select>
      </div>
    </div>
    <table class="list">
      <?php for ($i = 0; $i < sizeof($products); $i = $i + 4) { ?>
      <tr>
        <?php for ($j = $i; $j < ($i + 4); $j++) { ?>
        <td width="25%"><?php if (isset($products[$j])) { ?>
          <a href="<?php echo str_replace('&', '&amp;', $products[$j]['href']); ?>"><img src="<?php echo $products[$j]['thumb']; ?>" title="<?php echo $products[$j]['name']; ?>" alt="<?php echo $products[$j]['name']; ?>" /></a><br />
          <a href="<?php echo str_replace('&', '&amp;', $products[$j]['href']); ?>"><?php echo $products[$j]['name']; ?></a><br />
          <span style="color: #999; font-size: 11px;"><?php echo $products[$j]['model']; ?></span><br />
          <?php if ($display_price) { ?>
          <?php if (!$products[$j]['special']) { ?>
          <span style="color: #900; font-weight: bold;"><?php echo $products[$j]['price']; ?></span>
          <?php } else { ?>
          <span style="color: #900; font-weight: bold; text-decoration: line-through;"><?php echo $products[$j]['price']; ?></span> <span style="color: #F00;"><?php echo $products[$j]['special']; ?></span>
          <?php } ?>
          <a class="button_add_small" href="<?php echo $products[$j]['add']; ?>" title="<?php echo $button_add_to_cart; ?>" >&nbsp;</a>
          <?php } ?>
          <br />
          <?php if ($products[$j]['rating']) { ?>
          <img src="catalog/view/theme/default/image/stars_<?php echo $products[$j]['rating'] . '.png'; ?>" alt="<?php echo $products[$j]['stars']; ?>" />
          <?php } ?>
          <?php } ?></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </table>
  <div class="pagination"><?php echo $pagination; ?></div>
</div>
  <div class="bottom">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center"></div>
  </div>
</div>
<?php echo $footer; ?> 
