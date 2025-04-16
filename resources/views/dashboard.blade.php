<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PersonalExpenseTracker - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Personal Expense Tracker </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

              </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('reset_password') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Reset Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <button id="confirmLogoutBtn" class="btn btn-primary btn-sm">Logout</button>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">ADD CATEGORY</div>
                                            <br>
                                            <form id="addCategoryForm" class="user">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="name" name="name" aria-describedby="emailHelp"
                                                        placeholder="Category Name">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                   ADD
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">ADD EXPENSES</div>
                                            <br>
                                            <form id="expensesForm" class="user">
                                                <div class="form-group">
                                                    <input type="number" step="0.01" class="form-control form-control-user"
                                                        id="amount" name="amount" placeholder="Amount" required>
                                                </div>

                                                <div class="form-group">
                                                    <select id="category_id" name="category_id" class="form-control form-control-user" required>
                                                        <option value="">Select Category</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="description" name="description" placeholder="Description (optional)">
                                                </div>

                                                <div class="form-group">
                                                    <input type="date" class="form-control form-control-user"
                                                        id="date" name="date" required>
                                                </div>

                                                <button type="submit" class="btn btn-warning btn-user btn-block">
                                                    Add Expense
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <h4>List Categories</h4>
                            <table class="table table-bordered" id="categoryTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="categoryTableBody">
                                </tbody>
                            </table>

                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-5">
                            <div class="card shadow mb-4">
                            <div class="table-responsive">
                            <h4>List Expenses</h4>
                                <table class="table table-bordered" id="expensesTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Note</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="expensesBody">
                                    </tbody>
                                </table>
                                <div class="modal fade" id="editExpenseModal" tabindex="-1" role="dialog" aria-labelledby="editExpenseModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editExpenseForm">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="editExpenseModalLabel">Edit Expense</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="editExpenseId">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="editCategoryId" required></select>
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" id="editAmount" required>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="editDate" required>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" id="editNote"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Expense</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>

                                <script>
                                        const tok = localStorage.getItem('access_token');

                                        function loadEditCategories(selectedId = null) {
                                            axios.get("{{ url('/api/categories') }}", {
                                                headers: { Authorization: `Bearer ${tok}` }
                                            })
                                            .then(res => {
                                                const select = document.getElementById('editCategoryId');
                                                select.innerHTML = '';
                                                res.data.forEach(cat => {
                                                    const opt = document.createElement('option');
                                                    opt.value = cat.id;
                                                    opt.textContent = cat.name;
                                                    if (cat.id === selectedId) opt.selected = true;
                                                    select.appendChild(opt);
                                                });
                                            });
                                        }

                                        function editExpense(id) {
                                            axios.get(`{{ url('/api/expenses') }}/${id}`, {
                                                headers: { Authorization: `Bearer ${token}` }
                                            })
                                            .then(res => {
                                                const exp = res.data;
                                                document.getElementById('editExpenseId').value = exp.id;
                                                document.getElementById('editAmount').value = exp.amount;
                                                document.getElementById('editDate').value = exp.date;
                                                document.getElementById('editNote').value = exp.description || '';
                                                loadEditCategories(exp.category_id);
                                                $('#editExpenseModal').modal('show');
                                            });
                                        }

                                        // Handle update submit
                                        document.getElementById('editExpenseForm').addEventListener('submit', function(e) {
                                            e.preventDefault();

                                            const id = document.getElementById('editExpenseId').value;
                                            const updatedData = {
                                                category_id: document.getElementById('editCategoryId').value,
                                                amount: document.getElementById('editAmount').value,
                                                date: document.getElementById('editDate').value,
                                                description: document.getElementById('editNote').value
                                            };

                                            axios.put(`{{ url('/api/expenses') }}/${id}`, updatedData, {
                                                headers: { Authorization: `Bearer ${token}` }
                                            })
                                            .then(() => {
                                                $('#editExpenseModal').modal('hide');
                                                alert('Expense updated!');
                                                fetchExpenses();
                                            })
                                            .catch(err => {
                                                alert('Failed to update.');
                                                console.error(err);
                                            });
                                        });


                                function deleteExpense(id) {
                                    if (!confirm("Are you sure you want to delete this expense?")) return;

                                    const token = localStorage.getItem('access_token');

                                    axios.delete(`{{ url('/api/expenses') }}/${id}`, {
                                        headers: {
                                            Authorization: `Bearer ${token}`
                                        }
                                    })
                                    .then(() => {
                                        alert("Expense deleted successfully.");
                                        fetchExpenses();
                                    })
                                    .catch((error) => {
                                        alert("Failed to delete expense.");
                                        console.error(error);
                                    });
                                }
                                </script>

                            </div>

                            </div>
                        </div>
                    </div>

                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <script>
  document
    .getElementById('confirmLogoutBtn')
    .addEventListener('click', function () {
      const token = localStorage.getItem('access_token');
      
      axios.post('{{ url("api/logout") }}', {}, {
        headers: {
          Authorization: 'Bearer ' + token
        }
      })
      .then(response => {
        localStorage.removeItem('access_token');
        window.location.href = '{{ url("/") }}';
      })
      .catch(error => {
        console.error(error);
        alert('Could not logout. Please try again.');
      });
    });
</script>
<script>
document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const token = localStorage.getItem('access_token');

    if (!token) {
        alert("You must be logged in.");
        return;
    }

    axios.post("{{ url('api/categories') }}", {
        name: name
    }, {
        headers: {
            Authorization: `Bearer ${token}`
        }
    })
    .then(function(response) {
        alert("Category added successfully!");
        document.getElementById('addCategoryForm').reset(); 
    })
    .catch(function(error) {
        if (error.response && error.response.data && error.response.data.errors) {
            const errors = error.response.data.errors;
            let messages = Object.values(errors).flat().join('\n');
            alert(messages);
        } else if (error.response && error.response.data && error.response.data.message) {
            alert(error.response.data.message);
        } else {
            alert("Something went wrong.");
        }
    });
});
</script>
<script>
    const token = localStorage.getItem('access_token');
    const apiUrl = "{{ url('api/categories') }}";

    function loadCategories() {
        axios.get(apiUrl, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(response => {
            const tbody = document.getElementById('categoryTableBody');
            tbody.innerHTML = '';

            response.data.forEach(category => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${category.id}</td>
                    <td>${category.name}</td>
                    <td>
                        <button class="btn btn-sm btn-info" onclick="editCategory(${category.id}, '${category.name}')">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteCategory(${category.id})">Delete</button>
                    </td>
                `;

                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error('Error loading categories:', error);
            alert('Failed to load categories');
        });
    }

    function deleteCategory(id) {
        if (!confirm("Are you sure you want to delete this category?")) return;

        axios.delete(`${apiUrl}/${id}`, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(() => {
            alert("Category deleted!");
            loadCategories(); 
        })
        .catch(error => {
            console.error('Delete error:', error);
            alert("Could not delete category.");
        });
    }

    function editCategory(id, currentName) {
        const newName = prompt("Edit category name:", currentName);
        if (newName === null || newName.trim() === '') return;

        axios.put(`${apiUrl}/${id}`, { name: newName }, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(() => {
            alert("Category updated!");
            loadCategories(); 
        })
        .catch(error => {
            console.error('Update error:', error);
            alert("Could not update category.");
        });
    }

    document.addEventListener('DOMContentLoaded', loadCategories);
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('access_token');

    axios.get("{{ url('/api/categories') }}", {
        headers: {
            Authorization: `Bearer ${token}`
        }
    })
    .then(function (response) {
        const categorySelect = document.getElementById('category_id');
        response.data.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id;
            option.textContent = category.name;
            categorySelect.appendChild(option);
        });
    })
    .catch(function (error) {
        console.error("Error loading categories:", error);
        alert("Failed to load categories.");
    });

    document.getElementById('expensesForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const amount = document.getElementById('amount').value;
        const category_id = document.getElementById('category_id').value;
        const description = document.getElementById('description').value;
        const date = document.getElementById('date').value;

        axios.post("{{ url('/api/expenses') }}", {
            amount: amount,
            category_id: category_id,
            description: description,
            date: date
        }, {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(function (response) {
            alert("Expense added successfully!");
            document.getElementById('expensesForm').reset();
        })
        .catch(function (error) {
            if (error.response && error.response.data && error.response.data.errors) {
                let errors = Object.values(error.response.data.errors).flat().join('\n');
                alert(errors);
            } else {
                alert("Failed to add expense.");
            }
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const token = localStorage.getItem('access_token');

    function fetchExpenses() {
        axios.get("{{ url('/api/expenses') }}", {
            headers: {
                Authorization: `Bearer ${token}`
            }
        })
        .then(function (response) {
            const tbody = document.getElementById('expensesBody');
            tbody.innerHTML = "";

            response.data.forEach((expense, index) => {
                const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${expense.category.name}</td>
                        <td>${expense.amount}</td>
                        <td>${expense.date}</td>
                        <td>${expense.description || ''}</td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editExpense(${expense.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="deleteExpense(${expense.id})">Delete</button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        })
        .catch(function (error) {
            alert("Failed to load expenses");
            console.log(error);
        });
    }

    fetchExpenses();

    window.fetchExpenses = fetchExpenses;
});
</script>



</body>

</html>