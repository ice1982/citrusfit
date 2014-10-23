<?php
class ImageBehavior extends CActiveRecordBehavior
{
    public $imagePath  = '';
    public $imageField = '';

    public $crop = true;

    public $newImageFilename = '';
    public $newImageThumb    = true;
    public $newImageResizeWidth    = 910;
    public $newImageResizeHeight   = 350;
    public $newImageCropWidth    = 910;
    public $newImageCropHeight   = 350;

    public function getImageUrl(){
        return $this->_getBaseImagePath() . $this->owner->{$this->imageField};
    }

    public function getImageThumbUrl(){
        return $this->_getBaseImagePath() . 'small_' . $this->owner->{$this->imageField};
    }

    private function _getBaseImagePath(){
        return Yii::app()->request->baseUrl . '/' . $this->imagePath . '/';
    }

    public function beforeSave($event)
    {
        // $this->owner->image = 'TRUE';

        if ($image_file = CUploadedFile::getInstance($this->owner, $this->imageField)) {
            $extension = $image_file->getExtensionName();

            $filename         = $this->newImageFilename . '.' . $extension;
            $filenameWithPath = $this->imagePath . '/' . $filename;
            $thumbWithPath    = $this->imagePath . '/thumb_' . $filename;

            if ($image_file->saveAs($filenameWithPath)) {
                $image = Yii::app()->image->load($filenameWithPath);
                $image->resize($this->newImageResizeWidth, null);

                if ($this->crop == true) {
                    $image->crop($this->newImageCropWidth, $this->newImageCropHeight);
                }

                if ($this->newImageThumb === true) {
                    $image->save($thumbWithPath);
                } else {
                    $image->save($filenameWithPath);
                }
                $this->owner->image = $filename;
            }
        }
    }
}
?>