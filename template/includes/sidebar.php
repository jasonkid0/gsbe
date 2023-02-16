<?php include "dbcon.php";


    if($_SESSION['role'] == "Administrator"){
      echo '

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item">

                  <!-- Home Button for Librarian -->
                    <a class="nav-link" href="../../pages/librarian/index.php">


                      <i class="mdi mdi-grid-large menu-icon"></i>
                      <span class="menu-title">HOME</span>
                    </a>
                  </li>


                  <li class="nav-item nav-category">SEARCH</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#search" aria-expanded="false" aria-controls="search">
                      <i class="menu-icon mdi mdi-book-search-outline"></i>
                      <span class="menu-title">Search Books</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="search">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/books/book_search.php">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/ebooks/ebook_search.php">E-Books</a></li>
                      </ul>
                    </div>
                  </li>
                  

                  <li class="nav-item nav-category">Special Collection</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#thesis" aria-expanded="false" aria-controls="thesis">
                      <i class="menu-icon mdi mdi-book-outline"></i>
                      <span class="menu-title">View Details</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="thesis">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/special_collections/special_collection_search.php">Search Thesis</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/special_collections/add_special_collection.php">Add Thesis</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/borrow/borrow_collection.php">Special Collection Checkout</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/special_collections/categories_special_collection.php">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/special_collections/courses_special_collection.php">Courses</a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">USER MAINTENANCE</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                      <i class="menu-icon mdi mdi-tune"></i>
                      <span class="menu-title">User Pages</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/students/student_search.php"> Search User </a></li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/students/add_student.php"> Add User </a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">BOOK & E-BOOK MAINTENANCE</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" aria-expanded="false" aria-controls="maintenance">
                      <i class="menu-icon mdi mdi-settings-outline"></i>
                      <span class="menu-title">View Details</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="maintenance">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/books/add_book.php">Add Book</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/ebooks/add_ebook.php">Add E-Book</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/maintenance/moa.php">Mode of Acquisition</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/maintenance/publisher.php">Publisher</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/maintenance/pop.php">Place of Publication</a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">BORROW</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#borrow" aria-expanded="false" aria-controls="borrow">
                      <i class="menu-icon mdi mdi-account-clock-outline"></i>
                      <span class="menu-title">Borrow Book</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="borrow">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/borrow/borrow.php">Scan Student ID</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/borrow/borrowed_book.php">Borrowed Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/borrow/returned_book.php">Returned Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/borrow/settings.php">Settings</a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">Summary Reports</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sr" aria-expanded="false" aria-controls="sr">
                      <i class="menu-icon mdi mdi-finance"></i>
                      <span class="menu-title">View Details</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="sr">
                      <ul class="nav flex-column sub-menu">
                      <label> Utilization Records </label>
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/utilization/utilization_record.php"> Active Records </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/utilization/inactive_record.php"> Inactive Records </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/utilization/inventory.php"> Inventory </a></li>
                          </ul>
                        </ul>
                      </div>
                    <div class="collapse" id="sr">
                      <ul class="nav flex-column sub-menu">
                        <label> Archives </label>
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../pages/archives/archive_book.php"> Inactive Books </a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../pages/archives/archive_thesis.php"> Inactive Thesis </a></li>
                          </ul>
                      </ul>   
                    </div>
                  </li>


                  <li class="nav-item nav-category">DATABASE MAINTENANCE</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#db" aria-expanded="false" aria-controls="db">
                      <i class="menu-icon mdi mdi-database"></i>
                      <span class="menu-title">Database Pages</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="db">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/db_maintenance/backup.php"> Backup Database </a></li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/db_maintenance/restore.php"> Restore Database </a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </nav>
              
    '; } 

elseif($_SESSION['role'] == "Super Admin"){
      echo '

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item">

                  <!-- Home Button for Super Admin -->
                    <a class="nav-link" href="../../pages/admin/super_admin_home.php">


                      <i class="mdi mdi-grid-large menu-icon"></i>
                      <span class="menu-title">HOME</span>
                    </a>
                  </li>


                  <li class="nav-item nav-category">SEARCH</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#search" aria-expanded="false" aria-controls="search">
                      <i class="menu-icon mdi mdi-book-search-outline"></i>
                      <span class="menu-title">Search Books</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="search">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/books/book_search.php">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/ebooks/ebook_search.php">E-Books</a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">LIBRARIAN MAINTENANCE</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                      <i class="menu-icon mdi mdi-tune"></i>
                      <span class="menu-title">Librarian Pages</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/librarian/librarian_list.php"> Librarian List </a></li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/librarian/add_librarian.php"> Add Librarian </a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">DATABASE MAINTENANCE</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#db" aria-expanded="false" aria-controls="db">
                      <i class="menu-icon mdi mdi-database"></i>
                      <span class="menu-title">Database Pages</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="db">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../../pages/db_maintenance/backup.php"> Backup Database </a></li>
                        <li class="nav-item"> <a class="nav-link" href="../../pages/db_maintenance/restore.php"> Restore Database </a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </nav>
              
    '; }

elseif($_SESSION['role'] == "Student"){
      echo '

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item">

                  <!-- Home Button for Librarian -->
                    <a class="nav-link" href="../../pages/students/students_home.php">


                      <i class="mdi mdi-grid-large menu-icon"></i>
                      <span class="menu-title">HOME</span>
                    </a>
                  </li>


                  <li class="nav-item nav-category">SEARCH</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#search" aria-expanded="false" aria-controls="search">
                      <i class="menu-icon mdi mdi-book-search-outline"></i>
                      <span class="menu-title">Search Books</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="search">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/books/book_search.php">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/ebooks/ebook_search.php">E-Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/special_collections/special_collection_search.php">Search Special Collection</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/archives/archive_book.php">Search Archived Books</a></li>
                      </ul>
                    </div>
                  </li>


                  <li class="nav-item nav-category">BORROW</li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#borrow" aria-expanded="false" aria-controls="borrow">
                      <i class="menu-icon mdi mdi-account-clock-outline"></i>
                      <span class="menu-title">Borrow Book</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="borrow">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="../../pages/students/user_borrow.php">Borrowed Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../pages/students/user_history.php">Borrow History</a></li>
                      </ul>
                    </div>
                </ul>
              </nav>
              
    '; } 

