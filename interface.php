<?php
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// This will work
class WorkingTemplate implements Template
{
    private $vars = [];
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

// This will not work (I have'nt overrided the getHtml method)
class BadTemplate implements Template
{
    private $vars = [];
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
} 

?>