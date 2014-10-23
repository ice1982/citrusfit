<a href="/uploads/<?=$photo->image?>" rel="lightbox" title="<?=empty($photo->image_attr_title) ? $photo->title : $photo->image_attr_title?>">
    <img src="/uploads/thumb_<?=$photo->image?>" alt="<?=$photo->image_attr_alt?>" class="img-responsive">
</a>
