<!-- Navigation drawer -->
        <aside class="left-panel">
<?php
    if(!isset($_SESSION['user'])) { ?>
        <nav class="navigation">
            <ul class="list-unstyled">
                <li><a class="open-modal" data-target="#loginModal" href="signin.html"><i class="fa fa-sign-in"></i><span class="nav-label">Đăng nhập</span></a>
                </li>
                <li><a class="open-modal" data-target="#registerModal" href="signup.html"><i class="fa fa-user-plus"></i><span class="nav-label">Đăng ký</span></a>
                </li>
                <li><a href="faq.html"><i class="fa fa-question-circle"></i><span class="nav-label">FaQ</span></a>
                </li>
            </ul>
        </nav>
<?php } else { ?>
        <div class="user text-center">
            <a href="user1.html"><img src="assets/images/avtar/avatar.jpg" class="img-circle" alt="">
            </a>
            <h4 class="user-name"><?php echo $_SESSION['user']->username; ?></h4>
        </div>
        <nav class="navigation">
            <ul class="list-unstyled">
                <li><a href="upload.html"><i class="fa fa-upload"></i><span class="nav-label">Upload ảnh</span></a>
                </li>
                <li><a href="my-albums.html"><i class="fa fa-camera-retro"></i><span class="nav-label">Ảnh của tôi</span></a>
                </li>
                <li><a href="faq.html"><i class="fa fa-question-circle"></i><span class="nav-label">FAQ</span></a>
                </li>
                <li><a href="edit-user.html"><i class="fa fa-pencil-square-o"></i><span class="nav-label">Sửa thông tin</span></a>
                </li>
                <li><a href="?action=logout"><i class="fa fa-sign-out"></i><span class="nav-label">Đăng xuất</span></a>
                </li>
            </ul>
        </nav>
<?php } ?>
    </aside>