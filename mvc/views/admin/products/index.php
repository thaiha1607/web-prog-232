<?php
Utils\redirect_if_not_being_admin();
?>

<style>
    #add-product-header {
        background-color: #008848;
        text-decoration: none;
        color: white;
        border: 1px solid white;
        padding: 10px;
        border-radius: 5px;
    }
</style>
<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                   href="<?php echo Utils\BASE_URL ?>/Product/index"></a></li>
                    <!-- icon home -->
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>

            <h1 class="page-header-title">
                Products
                <span class="badge badge-soft-dark ml-2">
                    <?php if (isset($data)) {
                        echo mysqli_num_rows($data["products"]);
                    } ?>
                </span>
            </h1>
        </div>
        <div class="col-sm-auto">
            <a href="<?php echo Utils\BASE_URL ?>/Product/new"
               class="btn btn-primary"
               id="add-product-header"
            >
                Add Product
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-borderless card-table">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th colspan="2"></th>
            </tr>
            </thead>

            <tbody>
            <?php
            $categories = array();
            while ($row = mysqli_fetch_array($data["categories"])) {
                $categories[] = $row;
            }
            while ($row = mysqli_fetch_array($data["products"])) {
                ?>
                <tr>
                    <td>
                        <?php echo $row["id"] ?>
                    </td>
                    <td>
                        <?php echo $row["name"] ?>
                    </td>
                    <td>
                        <?php echo $categories[$row["id"] - 1]["name"] ?>
                    </td>
                    <td>
                        <?php echo $row["price"] ?>
                    </td>
                    <td>
                        <?php echo $row["qty"] ?>
                    </td>
                    <td>
                        <?php echo $row["description"] ?>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/product/edit/<?php echo $row["product_id"] ?>">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo Utils\BASE_URL ?>/product/delete/<?php echo $row["product_id"] ?>">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</div>

