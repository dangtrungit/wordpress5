<?php
    class ZendvnHtml {

        public function __construct($options = null){

        }
        
        // ======================= DISPLAY PHAN TU TEXTBOX===========================
        public function texbox($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlTextbox.php';
           return HtmlTextbox::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU FILE UPLOAD ===========================

        public function fileupload($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlFileupload.php';
           return HtmlFileupload::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU Button===========================

        public function button($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlButton.php';
           return HtmlButton::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU TEXT AREA===========================

        public function textarea($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlTextarea.php';
           return HtmlTextarea::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU SELECT BOX ===========================
        public function selectbox($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlSelectbox.php';
           return HtmlSelectbox::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU RADIO ===========================
        public function radio($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlRadio.php';
           return HtmlRadio::create($name,$value,$attr,$options);
        }
        // ======================= DISPLAY PHAN TU CHECKBOX ===========================
        public function checkbox($name= '', $value ='', $attr = array(), $options = null)
        {
           require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlCheckbox.php';
           return HtmlCheckbox::create($name,$value,$attr,$options);
        }

        // ======================= DISPLAY OPTIONAL INPUT===========================

      //   public function inputtypes_options($type='',$name= '', $value ='', $attr = array(), $options = null)
      //   {
      //      require_once ZEND_MP_INCLUDES_DIR . '/html/HtmlInputTypes.php';
      //      return HtmlInputTypes::create($type,$name,$value,$attr,$options);
      //   }

    }