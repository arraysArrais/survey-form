<?php

function checkSessionError()
{
    if (!empty($_SESSION['erro'])) {
        echo $_SESSION['erro'];
        $_SESSION['erro'] = '';
    }
    if (!empty($_SESSION['sucesso'])) {
        echo $_SESSION['sucesso'];
        $_SESSION['sucesso'] = '';
    }
}
