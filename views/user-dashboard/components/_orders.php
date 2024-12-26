 <div class="fade show" id="pills-order" role="tabpanel"
     aria-labelledby="pills-order-tab">
     <div class="dashboard-order">
         <div class="title">
             <h2>My Orders History</h2>
             <span class="title-leaf title-leaf-gray">
                 <svg class="icon-width bg-gray">
                     <use xlink:href="/web/frontend/assets/svg/leaf.svg#leaf"></use>
                 </svg>
             </span>
         </div>

         <div class="order-contain">
             <?php foreach ($orderItems as $row) { ?>
                 <div class="order-box dashboard-bg-box w-100 mb-3">
                     <div class="order-container d-flex justify-content-between align-items-center">

                         <div class="order-detail">
                             <h4><span class="<?= $row->order->status == 'Processing' ? 'success-bg' : 'text-muted' ?>"><?= $row->order->status ?? '' ?></span></h4>
                         </div>

                         <div class="order-id">
                             <h6 class="text-content">Order ID: <strong>209398473</strong></h6>
                         </div>

                         <div class="order-date">
                             <h6 class="text-content">Order Date: <strong><?= $row->order->created_at ?? '' ?></strong></h6>
                         </div>

                     </div>


                     <div class="table-responsive">
                         <table class="table align-middle">
                             <tbody>
                                 <tr class="d-flex justify-content-between align-items-center">
                                     <!-- Product Image -->
                                     <td class="align-middle" style="width: 120px;">
                                         <a href="product-left-thumbnail.html" class="order-image">
                                             <img src="/web/uploads/<?= $row->product->thumbnail ?>" class="img-fluid blur-up lazyload" alt="Product Image">
                                         </a>
                                     </td>

                                     <!-- Product Details -->
                                     <td class="align-middle d-flex flex-column flex-md-row justify-content-between">
                                         <a href="product-left-thumbnail.html">
                                             <h3 class="mb-0"><?= $row->product->name ?></h3>
                                         </a>
                                     </td>

                                     <!-- Product Price -->
                                     <td class="align-middle text-center">
                                         <div class="size-box">
                                             <h6 class="text-content mb-1">Price:</h6>
                                             <h5>Ksh. <?= $row->selling_price ?></h5>
                                         </div>
                                     </td>

                                     <!-- Product Quantity -->
                                     <td class="align-middle text-center">
                                         <div class="size-box">
                                             <h6 class="text-content mb-1">Quantity:</h6>
                                             <h5><?= $row->quantity ?></h5>
                                         </div>
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>


                 </div>
             <?php } ?>
         </div>

     </div>
 </div>