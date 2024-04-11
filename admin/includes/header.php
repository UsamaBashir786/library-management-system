<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    @media screen and (max-width:500px) {
        .logo-query {
            width: 65px !important;
            height: 30px !important;
        }
    }

    button.navbar-toggle {
        background-color: #008CBA;
        border: none;
        margin-top: 30px
    }

    .menu-section {
        background-color: #008CBA;
    }

    #menu-top.nav>li>a {
        color: #fff;
    }

    #menu-top.nav>li>a:hover {
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .dropdown-menu {
        background-color: #008CBA;
    }

    .dropdown-menu>li>a {
        color: #fff !important;
    }

    .menu-top-active {
        background-color: rgba(0, 0, 0, 0.1) !important;
    }

    .dropdown-menu>li>a:hover {
        background-color: rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .menu-section {
        border-bottom: 0 !important;
    }

    .btn-danger {
        border-radius: 0px;
        box-shadow: 0px 0px 4px black;
    }

    .btn-danger:hover {
        background-color: red;
        border-color: transparent;
    }

    .right-div {
        margin-top: 15px;
    }

    .navbar-toggle .icon-bar {
        background-color: #fff;
    }
</style>
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <div class="logo-query" style="width:100px;height:40px;">
                    <img src="assets/img/logos.png" style="width: 100%;" />
                </div>
            </a>

        </div>

        <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-category.php">Add
                                        Category</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="manage-categories.php">Manage Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Authors <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-author.php">Add
                                        Author</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="manage-authors.php">Manage Authors</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-book.php">Add
                                        Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="manage-books.php">Manage
                                        Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="issue-book.php">Issue New
                                        Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                        href="manage-issued-books.php">Manage Issued Books</a></li>
                            </ul>
                        </li>
                        <li><a href="reg-students.php">Reg Students</a></li>

                        <li><a href="change-password.php">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>