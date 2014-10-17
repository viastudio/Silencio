<div class="my_meta_control">
    <h2>Basic Examples</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Cras orci lorem, bibendum in pharetra ac, luctus ut mauris.</p>

    <label>Name</label>

    <p>
        <input type="text" name="<?php $metabox->the_name('name'); ?>" value="<?php $metabox->the_value('name'); ?>" />
        <span>Enter in a name</span>
    </p>

    <label>Description <span>(optional)</span></label>

    <p>
<?php $metabox->the_field('description'); ?>
        <textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
        <span>Enter in a description</span>
    </p>

    <p>
        <label>Select an Option</label>
<?php
$options = [
    'one' => 'Option One',
    'two' => 'Option Two',
    'three' => 'Option Three'
];

$mb->the_field('select_example');
?>
        <select name="<?php $metabox->the_name(); ?>">
            <option value="">Select...</option>
<?php
foreach ($options as $value => $label) {
?>
            <option value="<?php echo $value; ?>"<?php $metabox->the_select_state($value); ?>><?php echo $label; ?></option>

<?php
}
?>
        </select>
    </p>


    <p>

        <label>Check an Option</label>
<?php
$options = [
    'one' => 'Option One',
    'two' => 'Option Two',
    'three' => 'Option Three'
];

$mb->the_field('radio_example');
?>
<?php
foreach ($options as $value => $label) {
?>
            <label><input type="radio" name="<?php $mb->the_name(); ?>" value="<?php echo $value; ?>"<?php $mb->the_radio_state($value); ?>/> <?php echo $label; ?></label>

<?php
}
?>
    </p>



    <h2>Multiple Fields Examples</h2>

    <label>Authors <span>(Enter in each authors name)</span></label>

<?php
while ($metabox->have_fields('authors', 3)) {
?>
    <p>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" />
    </p>
<?php
}
?>

    <label>Info</label>

    <p>
        <!-- instead of using helper methods, you can also use array notation: name="custom_meta[info]" -->
        <input type="text" name="<?php $metabox->the_id(); ?>[info]" value="<?php echo !empty($meta['info']) ? $meta['info'] : ''; ?>" />
        <span>Enter in the info</span>
    </p>

    <label>Links <span>(Enter in the link title and url)</span></label>

<?php
while ($metabox->have_fields('links', 5)) {
?>
    <p>
<?php $metabox->the_field('title'); ?>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Title" />

        <input type="text" name="<?php $metabox->the_name('url'); ?>" value="<?php $metabox->the_value('url'); ?>" placeholder="Url" />
    </p>
<?php
}
?>


    <h2>And One Examples</h2>

    <p>And one field and field groups will initially display a
    single field, when new values are added and extra field is
    displayed allowing a user to add another value, and so on.</p>

    <label>And One... <span>(Enter in a value)</span></label>

<?php
while ($metabox->have_fields_and_one('and_one')) {
?>
    <p>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" />
    </p>
<?php
}
?>

    <label>And One Group <span>(Enter in the link title and description)</span></label>

<?php
while ($metabox->have_fields_and_one('and_one_group')) {
?>
    <p>
<?php $metabox->the_field('title'); ?>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="eg. Google" />

<?php $metabox->the_field('description'); ?>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="eg. http://google.com" />
    </p>
<?php
}
?>

    <h2>Repeating Groups</h2>
    <h4>Documents</h4>

    <a style="float:right; margin:0 10px;" href="#" class="dodelete-docs button">Remove All</a>

    <p>Add documents to the library by entering in a title, URL and selecting a level of access</p>

<?php
while ($mb->have_fields_and_multi('docs')) {
    $mb->the_group_open();
?>

<?php $mb->the_field('title'); ?>
        <label>Title and URL</label>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Document Title" /></p>

<?php $mb->the_field('link'); ?>
        <p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Document Link" /></p>

<?php $mb->the_field('access'); ?>
        <p><strong>Access:</strong>
            <input type="radio" name="<?php $mb->the_name(); ?>" value="admin"<?php echo $mb->is_value('admin') ? ' checked="checked"' : ''; ?> /> Admin
            <input type="radio" name="<?php $mb->the_name(); ?>" value="editor"<?php echo $mb->is_value('editor') ? ' checked="checked"' : ''; ?> /> Editor
            <input type="radio" name="<?php $mb->the_name(); ?>" value="subscriber"<?php echo $mb->is_value('subscriber') ? ' checked="checked"' : ''; ?> /> Subscriber

            <a href="#" class="button" style="margin-left:10px;" onclick="jQuery(this).siblings().removeAttr('checked'); return false;">Remove Access</a>
            <a href="#" class="dodelete button">Remove Document</a>
        </p>

<?php
    $mb->the_group_close();
}
?>

    <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add Document</a></p>

    <h2>Media Library</h2>
<?php
$wpalchemy_media_access = new WPAlchemy_MediaAccess();
$mb->the_field('imgurl');
$wpalchemy_media_access->setGroupName('nn')->setInsertButtonLabel('Insert');
?>

    <p>
<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
<?php echo $wpalchemy_media_access->getButton(); ?>
    </p>

<?php $mb->the_field('imgurl2'); ?>
<?php $wpalchemy_media_access->setGroupName('nn2')->setInsertButtonLabel('Insert This')->setTab('gallery'); ?>

    <p>
<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
<?php echo $wpalchemy_media_access->getButton(array('label' => 'Add Image From Library')); ?>
    </p>


</div>