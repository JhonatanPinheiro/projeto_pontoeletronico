<?php
# Funções específicas para ajudar a carregar as classes

function loadModel($modelName)
{
    $file = MODEL_PATH . "/{$modelName}.php";
    if (file_exists($file)) {
        require_once($file);
    } else {
        error_log("Arquivo do modelo não encontrado: $file");
    }
}

function loadView($viewName, $params = array())
{
    if (!empty($params) && is_array($params)) {
        extract($params, EXTR_OVERWRITE);
    }

    $file = VIEW_PATH . "/{$viewName}.php";
    if (file_exists($file)) {
        require_once($file);
    } else {
        error_log("Arquivo da view não encontrado: $file");
    }
}

function loadTemplateView($viewName, $params = array())
{
    if (!empty($params) && is_array($params)) {
        extract($params, EXTR_OVERWRITE);
    }

    # require_once(VIEW_PATH . "/header.php");
    # require_once(VIEW_PATH . "/menu.php");

    $file = VIEW_PATH . "/{$viewName}.php";
    if (file_exists($file)) {
        require_once($file);
    } else {
        error_log("Arquivo da template view não encontrado: $file");
    }

    # require_once(VIEW_PATH . "/footer.php");
}
