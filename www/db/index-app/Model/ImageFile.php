<?php
App::uses('AppModel', 'Model');
App::uses('AttachmentBehavior', 'Uploader.Model/Behavior');

class ImageFile extends AppModel {
	
	public $name = 'ImageFile';

	public $actsAs = array(
		'Uploader.Attachment' => array(
			'filename' => array(
				'uploadDir' => UPLOAD_DIR,
				'overwrite' => true,
				'finalPath' => '/resimler/',
				'transforms' => array(),
				'transport' => array(),
				'nameCallback' => 'deleteMe'
			)
		)
	);

	public $belongsTo = array(
		'ImageSize' => array(
			'className' => 'ImageSize',
			'foreignKey' => 'image_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'image_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $related = array(
		'model' => null,
		'image_id' => null,
		'model_id' => null,
		'file_ext' => null
	);

	public $toBeDelete = null;

	public $files = array('ImageFile' => array());

	public function deleteMe($name, $file, $append, $prepend) {
		$this->toBeDelete = $file;
	}

	public function formatName($name, $file, $append, $prepend) {
		$this->related['file_ext'] = $file->ext();
        $name = $this->related['model'] . (is_null($prepend) ? "" : "_" . $prepend) . "_" . $this->related['image_id'];
        if ($append != "thumb") {
        	$imageFile = new ImageFile();
        	$imageFile->create();
        	$imageFile->save(array('ImageFile' => array(
	        	'filename' => $name . '.' . $this->related['file_ext'],
	        	'image_id' => $this->related['image_id'] == null ? null : $this->related['image_id'],
	        	'image_size_id' => is_numeric($append) ? $append : null 
	        )), array('callbacks' => false));
	        unset($imageFile);
        }
        return $name;
    }

	public function beforeUpload($options) {
		$options['transforms'] = $this->actsAs['Uploader.Attachment']['filename']['transforms'];
		foreach ($options['transforms'] as $key => $value) {
			$options['transforms'][$key]['nameCallback'] = 'formatName';
			$options['transforms'][$key]['dbColumn'] =  $options['dbColumn'];
			$options['transforms'][$key]['uploadDir'] =  $options['uploadDir'];
			$options['transforms'][$key]['overwrite'] =  $options['overwrite'];
			$options['transforms'][$key]['finalPath'] =  $options['finalPath'];
			$options['transforms'][$key]['self'] = false;
		}
		$options['transforms']['thumb'] = array(
			'nameCallback' => 'formatName',
			'dbColumn' =>  $options['dbColumn'],
			'uploadDir' =>  $options['uploadDir'],
			'overwrite' =>  $options['overwrite'],
			'finalPath' =>  $options['finalPath'],
			'self' => false,
			'append' => 'thumb',
			'prepend' => null,
			'class' => 'crop',
			'width' => 100,
			'height' => 100
		);
		return $options;
	}
}
