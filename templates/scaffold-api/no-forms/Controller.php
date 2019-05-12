<?php
$namespace$
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
$useFullyQualifiedModelName$

class $className$Controller extends ControllerBase
{

    function create(){

        $singularVar$ = new $className$();

        $assignInputFromRequestCreate$

        if (!$singularVar$->save()) {
            $messages = "";
            foreach ($singularVar$->getMessages() as $message) {
                $messages .= $message;
            }
            throw new Exception($messages);
        }

        return $singularVar$->$pk$;

    }


    function update(){

        $pkVar$ = $this->request->getPost("$pk$");
        $singularVar$ = $className$::findFirstBy$pk$($pkVar$);

        if (!$singularVar$) {
            throw new Exception("$singular$ does not exist ");
        }

        $assignInputFromRequestUpdate$

        if (!$singularVar$->save()) {

            $messages = "";
            foreach ($singularVar$->getMessages() as $message) {
                $messages .= $message;
            }
            throw new Exception($messages);
        }

     return $pkVar$;

    }
    function readAll(){

        $listAll = $className$::find();
        if (!empty($listAll->getMessages())) {
            $messages = "";
            foreach ($listAll->getMessages() as $message) {
                $messages .= $message;
            }
            throw new Exception($messages);
        }

       return $listAll;
    }
    function delete($pkVar$){
        $singularVar$ = $className$::findFirstBy$pk$($pkVar$);
        if (!$singularVar$) {
            throw new Exception("required value not found");
        }

        if (!$singularVar$->delete()) {
            $messages = "";
            foreach ($singularVar$->getMessages() as $message) {
                $messages .= $message;
            }
            throw new Exception($messages);
        }

        return true;
    }


}
