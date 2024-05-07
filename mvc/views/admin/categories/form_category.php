<?php
Utils\redirect_if_not_being_admin();
?>

<div class="card">
    <div class="card-body">
        <?php
        if (isset($data) && isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $redirect_link = Utils\BASE_URL . "/Category/index";
            if (!isset($data["id"])) {
                if ($data["category_model"]->add_category($name)) {
                    Utils\redirect_with_message($redirect_link, "Thêm category thành công");
                } else {
                    Utils\redirect_with_message($redirect_link, "Thêm category thất bại");
                }
            } else {
                if ($data["category_model"]->update_category($id, $name)) {
                    Utils\redirect_with_message($redirect_link, "Cập nhật category thành công");
                } else {
                    Utils\redirect_with_message($redirect_link, "Cập nhật category thất bại");
                }
            }
        }
        ?>
        <form method="POST" action="">
            <div class="row form-group">
                <label for="id" class="col-sm-2 col-form-label input-label">ID</label>
                <div class="col-sm-10">
                    <label for="idInput"></label>
                    <input type="number"
                           id="idInput"
                           name="id"
                           class="form-control"
                           placeholder="Please input id"
                           value="<?php
                           if (isset($data["id"])) {
                               echo $data["id"];
                           }
                           ?>"
                           required
                    />
                </div>
            </div>
            <div class="row form-group">
                <label for="name" class="col-sm-2 col-form-label input-label">Name</label>
                <div class="col-sm-10">
                    <label for="nameInput"></label>
                    <input type="text"
                           id="nameInput"
                           name="name"
                           class="form-control"
                           placeholder="Please input name"
                           value="<?php
                           if (isset($data["category"]))
                               echo mysqli_fetch_assoc($data["category"])["name"]
                           ?>"
                           required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <input type="submit" value="Save changes" class="btn btn-primary" name="submit">
            </div>
        </form>

    </div>
</div>