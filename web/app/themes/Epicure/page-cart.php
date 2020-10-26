<?php get_header(); ?>

<table class="table Cart">
                <thead>
                    <tr>
                        <th class="tHead">Title</th>
                        <th class="tHead">Img</th>
                        <th class="tHead">Side</th>
                        <th class="tHead">Changes</th>
                        <th class="tHead">Quantity</th>
                        <th class="tHead">Price</th>
                        <th class="tHead">Remove</th>
                    </tr>
                </thead>

                <tbody>
               
                      
                
                </tbody>
</table>

  <form id="form1" class="cart-form">

    <div class="form-Stuff">
    <p>Total Price: <span class="form-Price"> 0 </span>  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
      <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
          <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
          <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
      </g>
  </svg></p>
    </div>

    <div class="form-Stuff">
     <label for="">Name</label>
     <input type="text" name="name">
    </div>

    <div class="form-Stuff">
    <label for="">Email</label>
     <input type="email" name="email">
    </div>

    <div class="form-Stuff">
     <label for="">Phone</label>
     <input type="tel" name="phone">
    </div>

    <input type="submit" class="CartButton" value="Make Order" > 
  </form>
 
<?php get_footer(); ?>