<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>ShopEase</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .dashboard-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #4a4a4a;
        }
        .add-user-btn {
            background-color: #6366F1;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .add-user-btn:hover {
            background-color: #4F46E5;
        }
        .user-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        .user-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .user-card-header {
            background-color: #6366F1;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #4F46E5;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            font-weight: 700;
        }
        .user-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }
        .user-card-body {
            padding: 1.5rem;
        }
        .user-info {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        .user-info i {
            color: #6366F1;
            margin-right: 0.5rem;
            width: 20px;
        }
        .user-card-footer {
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.5rem;
            background-color: #f8f9fa;
        }
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #10B981;
            color: white;
        }
        .btn-edit:hover {
            background-color: #059669;
        }
        .btn-delete {
            background-color: #EF4444;
            color: white;
        }
        .btn-delete:hover {
            background-color: #DC2626;
        }

        .icon-spacing {
        margin-right: 10px; 
        }


    /* EDIT POPUP MODAL */
    
    .modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.modal-content {
    background-color: #ffffff;
    border-radius: 24px !important;
    width: 90%;
    max-width: 400px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 2rem;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from { transform: translate(-50%, -60%); opacity: 0; }
    to { transform: translate(-50%, -50%); opacity: 1; }
}

.modal-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: #333;
    text-align: center;
}

.form-row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    flex: 1;
    margin-bottom: 1rem;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.form-group input:focus {
    outline: none;
    border-color: #4F46E5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    background-color: #ffffff;
}

.form-group input::placeholder {
    color: #adb5bd;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 1.5rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
}

.btn-cancel {
    background-color: #f1f3f5;
    color: #495057;
}

.btn-cancel:hover {
    background-color: #e9ecef;
}

.btn-save {
    background-color: #4F46E5;
    color: white;
}

.btn-save:hover {
    background-color: #4338ca;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(79, 70, 229, 0.1);
}

@media (max-width: 480px) {
    .modal-content {
        padding: 1.5rem;
    }
    
    .form-row {
        flex-direction: column;
        gap: 0;
    }
    
    .btn {
        padding: 0.6rem 1.2rem;
    }
}


       
    </style>
</head>
<body>

<?php $this->load->view('../components/navbar'); ?>

<div class="container">
    <div class="dashboard-header">
        <!-- <h1 class="dashboard-title">User Management</h1>
        <button class="add-user-btn">
            <i class="fas fa-plus-circle"></i> Add New User
        </button> -->
    </div>

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="user-grid">
    <?php if (!empty($users)) : ?>
        <?php foreach ($users as $user) : ?>
            <div class="user-card">
                <div class="user-card-header">
                    <div class="user-avatar">
                        <?php echo strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)); ?>
                    </div>
                    <h2 class="user-name"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h2>
                </div>
                <div class="user-card-body">
                    <p class="user-info">
                        <i class="fas fa-envelope icon-spacing"></i>
                        <?php echo $user['email']; ?>
                    </p>
                    <p class="user-info">
                        <i class="fas fa-phone icon-spacing"></i>
                        <?php echo $user['phone_number']; ?>
                    </p>
                    <!-- Add more fields as needed -->
                </div>
                <div class="user-card-footer">
                    <button onclick="openEditModal(<?php echo $user['id']; ?>)" class="btn btn-success">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button onclick="openDeleteModal(<?php echo $user['id']; ?>)" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="no-users">No users found. Click the "Add New User" button to get started!</p>
    <?php endif; ?>
    </div>
</div>

<div id="editModal" class="modal">
    <div class="modal-content">
        <!-- <h2 class="modal-title">Edit User</h2> -->
        <form id="editUserForm" method="post" action="<?php echo base_url('Dashboard/updateUser'); ?>">
            <input type="hidden" name="id" id="editUserId">
            <div class="form-row">
                <div class="form-group">
                    <input type="text" id="editFirstName" name="first_name" required placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="text" id="editLastName" name="last_name" required placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <input type="email" id="editEmail" name="email" required placeholder="Email">
            </div>
            <div class="form-group">
                <input type="tel" id="editPhoneNumber" name="phone_number" required placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="text" id="editPassword" name="password" required placeholder="Password">
            </div>
            <div class="form-actions">
                <button type="button" onclick="closeEditModal()" class="btn btn-success">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h2 class="modal-title">Confirm Deletion</h2>
        <p>Are you sure you want to delete this user? This action cannot be undone.</p>
        <div class="modal-buttons">
            <button onclick="closeDeleteModal()" class="btn btn-success">Cancel</button>
            <a id="deleteUserLink" href="#" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<?php $this->load->view('../components/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script>
    function openEditModal(userId) {
    fetch('<?php echo base_url('Dashboard/getUser/'); ?>' + userId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(user => {
            if (user.error) {
                console.error('Server returned an error:', user.error);
                alert('Error: ' + user.error);
                return;
            }
            console.log('User data received:', user);
            document.getElementById('editUserId').value = user.id;
            document.getElementById('editFirstName').value = user.first_name;
            document.getElementById('editLastName').value = user.last_name;
            document.getElementById('editEmail').value = user.email;
            document.getElementById('editPhoneNumber').value = user.phone_number;
            document.getElementById('editPassword').value = user.password;

            var modal = document.getElementById('editModal');
            modal.style.display = "block";
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('An error occurred while fetching the user data: ' + error.message);
        });
}


    function closeEditModal() {
        var modal = document.getElementById('editModal');
        modal.style.display = "none";
    }

    function openDeleteModal(userId) {
        var modal = document.getElementById('deleteModal');
        var deleteLink = document.getElementById('deleteUserLink');
        deleteLink.href = "<?php echo base_url('Dashboard/deleteUser/'); ?>" + userId;
        modal.style.display = "block";
    }

    function closeDeleteModal() {
        var modal = document.getElementById('deleteModal');
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        var editModal = document.getElementById('editModal');
        var deleteModal = document.getElementById('deleteModal');
        if (event.target == editModal) {
            editModal.style.display = "none";
        }
        if (event.target == deleteModal) {
            deleteModal.style.display = "none";
        }
    }
</script>
</body>
</html>

