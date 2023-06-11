<?php
function index()
{
    $products = getAnnonces();
    require_once 'front/index.php';
}

function products($id)
{
    $products = getAnnonceByCategorie($nomCategorie);
    require_once 'front/products.php';
}

function product($id)
{
    $product = getAnnonceById($id_annonce);
    require_once 'front/product.php';
}

function logUser()
{
    $user=getUserByEmail();
    require_once 'front/login.php';
}

function activUser()
{
    if (!empty($_POST)) {
        $data = $_POST;
        $data['admin'] = 0;
        set_user($data);
        header('Location: /index.php');      
        exit();  
    } else {
        require_once 'front/register.php';
    }
}

function admin_index()
{
    require_once 'admin/index.php';
}


function admin_categories()
{
    $categories = getCategories();
    require_once 'admin/categories.php';
}

function admin_products()
{
    $products = getAnnonces();
    require_once 'admin/products.php';
}

function admin_users()
{
    $users = getUsers(0);
    require_once 'admin/users.php';
}
function admin_product_add() 
{
    if (!empty($_POST)) {
        set_product($_POST, $_FILES);
        header('Location: /index.php/admin/products');      
        exit();  
    } else {
        $categories = getCategories();
        require_once 'admin/product_add.php';
    }
}
function admin_category_add()
{
    if (!empty($_POST)) {
        addCategorie($_POST);
        header('Location: /index.php/admin/categories');      
        exit();  
    } else {
        require_once 'admin/category_add.php';
    }
}
function admin_category_del($id) {
    removeCategorie($id_categorie);
    header('Location: /index.php/admin/categories');      
    exit();  
}
function admin_remove_product($id) {
    removeAnnonce($id_annonce);
    header('Location: /index.php/admin/products');      
    exit();  
}
function admin_remove_user($id) {
    removeUser($id_membre);
    header('Location: /index.php/admin');      
    exit();  
}
function admin_user_add() {
    if (!empty($_POST)) {
        addUser($_POST);
        header('Location: /index.php/admin');      
        exit();  
    } else {
        require_once 'admin/user_add.php';
    }
}
function try_login() {
    $user = logUser($_POST);
    if (!empty($user)) {
        $_SESSION["logged"] = true;
        $_SESSION["id"] = $user['id'];
        $_SESSION["email"] = $user['email'];  
        if ($user['admin'] == 1) {
            header('Location: /index.php/admin');      
        } else {
            header('Location: /index.php');      
        }
        exit();  
    } else {
        require_once 'front/error.php';
    }
}
function admin_categories_import() {
    if (!empty($_FILES)) {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $i = 0;
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($i > 0) {
                set_category(['name' => $data[0]]);
            }
            $i++;
        }
        header('Location: /index.php/admin');     
        exit();
    }
    require_once 'admin/import.php';
}
function admin_user_import() {
    if (!empty($_FILES)) {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        $i = 0;
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($i > 0) {
                set_user(
                    [
                        'email' => $data[0],
                        'password' => $data[1],
                        'admin' => $data[2]
                    ]
                );
            }
            $i++;
        }
        header('Location: /index.php/admin');     
        exit();
    }
    require_once 'admin/import.php';
}

function register()
{
    if (!empty($_POST)) {
        $data = $_POST;
        $data['admin'] = 0;
        set_user($data);
        header('Location: /index.php');      
        exit();  
    } else {
        require_once 'front/register.php';
    }
}