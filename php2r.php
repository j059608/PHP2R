<?php
/**
 * undocumented class
 *
 * @package default
 * @author j059608
 **/
class php2r{

    var $fp;

    /**
     * constructor.
     * initialize.
     * @param
     * @return void
     * @author j059608
     **/
    function __construct(){
        $this->php2r();
    }
	
	
	/**
	 * undocumented function
	 * @param
	 * @return void
	 * @author j059608
	 **/
    function php2r(){	
        $this->fp = fopen("rscript.r","w");
    }	

    /**
     * undocumented function
     * @param $objectName
     * @return void
     * @author j059608
     **/
    function combine($objectName,$arrVarious){
        //check error function
        $temp = "(";
        for($i = 0;$i < count($arrVarious);$i++){
            $temp .= $arrVarious[$i];
            if($i < count($arrVarious) - 1){
                $temp .= ",";
            }
            
        }
        $temp .= ");";
        $this->r($objectName."=c".$temp);
    }
    
    /**
     * undocumented function
     *
     * @return void
     * @author j059608
     **/
    public function r($value='')
    {
        fwrite($this->fp,$value);
    }
    
    /**
    * print content R object.
    */
    function printObject($objectName)
    {
        $this->r($objectName);
    }
    
    /**
    * execute R script.
    */
    function execute(){
        #execute generated temporary R file
        #output $output
        ob_start();
        $output = shell_exec('R --vanilla --slave < rscript.r');
        echo $output;
        
        $this->_quit();
    }	

    /**
     * parse R output value for PHP
     *
     * @return void
     * @author j059608
     **/
    function parseRoutput($value)
    {
        
        return $value
    }

    private function _quit(){
        #remove temporary R file
//        shell_exec('rm rscript.r');
        fclose($this->fp); 	
    }
	
}