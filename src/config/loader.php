<?php
#Funções especificas para ajudar carregar as classe

function loadModel($modelName){
    require_once(MODEL_PATH. "/{$modelName}.php");
}
