<?php


$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];


?>
<div class="fade show" id="pills-address" role="tabpanel"
    aria-labelledby="pills-address-tab">
    <div class="dashboard-address">
        <div class="title title-flex">
            <div>
                <h2>My Address Book</h2>
                <span class="title-leaf">
                    <svg class="icon-width bg-gray">
                        <use xlink:href="/web/frontend/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>

            <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                data-bs-toggle="modal" data-bs-target="#add-address"><i data-feather="plus"
                    class="me-2"></i> Add New Address</button>
        </div>

        <div class="row g-sm-4 g-3">
            <?php foreach ($addresses as $address) { ?>
                <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                    <div class="address-box">
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jack"
                                    id="flexRadioDefault2" checked>
                            </div>

                            <div class="label">
                                <label>Home</label>
                            </div>

                            <div class="table-responsive address-table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><?= $address->first_name ?></td>
                                        </tr>

                                        <!-- <tr>
                                            <td>Pin Code :</td>
                                            <td>+380</td>
                                        </tr> -->

                                        <tr>
                                            <td>Phone :</td>
                                            <td><?= $address->phone_no ?></td>
                                        </tr>

                                        <tr>
                                            <td>Address :</td>
                                            <td>
                                                <p><?= $address->address ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                data-bs-target="#add-address"><i data-feather="edit"></i>
                                Edit</button>
                            <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                Remove</button>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>