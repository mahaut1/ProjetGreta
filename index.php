<?php
session_start();
require_once "modele.php";
require_once "controllers.php";


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($uri, "admin") !== false) {
    include_once "view/header_admin.php";
} else {
    $header_categories = getCategories();
    include_once "view/header.php";
}

?>

<?php
if ('/index.php' == $uri)
{
    echo index();
}
elseif ('/index.php/products' == $uri && isset($_GET['id']))
{
    echo products($_GET['id']);
}
elseif ('/index.php/product' == $uri && isset($_GET['id']))
{
    echo product($_GET['id']);
}
elseif ('/index.php/login' == $uri)
{
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo logUser();
    } else {
        echo login();
    }
}
elseif ('/index.php/logout' == $uri)
{
    $_SESSION["logged"] = false;
    $_SESSION["id"] = null;
    $_SESSION["email"] = null;  
    header('Location: /index.php');
    exit();   
}

elseif ('/index.php/signup' == $uri)
{
    echo register();
}
elseif ('/index.php/admin/index' == $uri)
{
    echo admin_index();
}
elseif ('/index.php/admin/admins' == $uri)
{
    echo admin_admins();
}
elseif ('/index.php/admin/categories' == $uri)
{
    echo admin_categories();
}
elseif ('/index.php/admin/category/add' == $uri)
{
    echo admin_category_add();
}
elseif ('/index.php/admin/products' == $uri)
{
    echo admin_products();
}
elseif ('/index.php/admin/products/add' == $uri)
{
    echo admin_product_add();
}
elseif ('/index.php/admin/category/del' == $uri)
{
    echo admin_category_del($_GET['id']);
}
elseif ('/index.php/admin/categories/import' == $uri)
{
    echo admin_categories_import();
}
elseif ('/index.php/admin/product/del' == $uri)
{
    echo admin_remove_product($_GET['id']);
}
elseif ('/index.php/admin/admin/del' == $uri)
{
    echo admin_remove_user($_GET['id']);
}
elseif ('/index.php/admin/user/del' == $uri)
{
    echo admin_remove_user($_GET['id']);
}
elseif ('/index.php/admin/user/add' == $uri)
{
    echo addUser();
}
elseif ('/index.php/admin/user/import' == $uri)
{
    echo admin_user_import();
}
elseif ('/index.php/admin/users' == $uri)
{
    echo admin_users();
}

?>

<?php include_once "view/footer.php"; ?>