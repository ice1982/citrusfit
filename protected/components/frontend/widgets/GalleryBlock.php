<?php
class GalleryBlock extends CWidget
{
    public $id = '';
    public $album = '';

    public $captions = 'off';
    public $row_span = 4;
    public $limit = '';
    public $order = 'asc';

    public $height = '';

    public function run()
    {
        $widget_id = 'gallery' . md5(time() . rand(1, 9999999));

        if (!empty($this->id)) {

            $count = substr_count($this->id, ',');

            if (empty($count)) {
                // Показываем только одну фотку
                $photo = GalleryItem::model()->findByPk($this->id);

                $this->render('galleryOnePhoto', array(
                    'photo' => $photo,
                ));
            } else {
                $ids = str_replace(' ', '', $this->id);
                $ids_array = explode(',', $ids);

                $photos = GalleryItem::model()->findAllByPkArray($ids_array, $this->order, $this->limit);

                $this->render('galleryListPhotos', array(
                    'height' => $this->height,
                    'photos' => $photos,
                    'row_span' => $this->row_span,
                    'captions' => $this->captions,
                    'widget_id' => $widget_id,
                ));
            }
        } elseif (!empty($this->album)) {

            $photos = GalleryItem::model()->findAllByAlbumTitle($this->album, $this->order, $this->limit);

            $this->render('galleryListPhotos', array(
                'height' => $this->height,
                'photos' => $photos,
                'row_span' => $this->row_span,
                'captions' => $this->captions,
                'widget_id' => $widget_id,
            ));
        }
    }
}
?>
