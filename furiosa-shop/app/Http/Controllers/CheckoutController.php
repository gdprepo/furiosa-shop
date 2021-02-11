<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use DateTime;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;
use App\Livraison;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //   SEOMeta::setTitle('Payer | Atelier Depaire');

        if (Cart::count() <= 0) {
            return redirect()->route('shop');
        }

        Stripe::setApiKey('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');
        
        // var_dump()
        
        if (getPrice(Cart::subtotal()) >= 59.99) {
         $prix = round(getPrice(Cart::total()));
        } else {
         $prix = round(getPrice(floatval(Cart::total())* 1000 + 499));

        }
        $intent = PaymentIntent::create([
            'amount' => $prix,
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');
        
        return view('checkout.index', [
            'clientSecret' => $clientSecret,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function livraison()
    {
        return view('checkout.livraison');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
    
        $livraison = new Livraison;

        $livraison->nom = $request->get('nom');
        $livraison->prenom = $request->get('prenom');
        $livraison->adresse = $request->get('adresse');
        $livraison->ville = $request->get('ville');
        $livraison->codepostal = $request->get('codepostal');
        $livraison->pays = $request->get('pays');

        if (Auth::check()) {
            $livraison->user_id = Auth::user()->id;
            $livraison->email = Auth::user()->email;
        } else {
            $livraison->email = $request->get('email');

        }

        $livraison->save();


        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $products = array($products);
        $product = json_encode($products);


        if(Auth::check()) {

            $order = new Order();

            $order->payment_intent_id = $data['paymentIntent']['id'];
            $order->amount = $data['paymentIntent']['amount'];

            $order->payment_created_at = (new DateTime())
                ->setTimestamp($data['paymentIntent']['created'])
                ->format('Y-m-d H:i:s');

            $products = [];
            $i = 0;

            foreach (Cart::content() as $product) {
                $products['product_' . $i][] = $product->model->title;
                $products['product_' . $i][] = $product->model->price;
                $products['product_' . $i][] = $product->qty;
                $i++;
            }

            $order->products = serialize($products);


            $order->user_id = Auth()->user()->id;

            $order->save();


        }


        if ($data['paymentIntent']['status'] === 'succeeded') {


            if (Auth::check()) {
                $livraison = DB::table('livraisons')->where('user_id', Auth::user()->id)->first();
            } else {
                $livraison = DB::table('livraisons')->latest()->first();
            }
      
            $to      = "gabindepaire@gmail.com";
            $subject = "CLIENT MD";
            $email_form = 'md.siteweb98@gmail.com';
    
    
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=edge" />
               <meta name="viewport" content="width=device-width, initial-scale=1.0" />
               <title>Commande Confirmation</title>

               <style type="text/css">
                  body {
                        margin: 0;
                        background-color: #cccccc;
                  }
                  table {
                        border-spacing: 0;
                  }
                  td {
                        padding: 0;
                  }
                  img {
                        border: 0;
                  }
                  .wrapper {
                        width: 100%;
                        table-layout: fixed;
                        background-color: #cccccc;
                        padding-bottom: 40px;
                  }
                  .main {
                        background-color: black;
                        margin: 0 auto;
                        width: 100%;
                        max-width: 600px;
                        border-spacing: 0;
                        color: #4a4a4a;
                  }

                  .two-columns {
                        text-align: center;
                        background-color: white;
                        font-size: 0;
                        padding: 40px 0;
                  }

                  .two-columns .column{
                        width: 100%;
                        max-width: 300px;
                        display: inline-block;
                        vertical-align: top;
                        font-size: 18px;
                        padding-bottom: 40px;
                  }

                  .button {
                        background-color: #464646;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 15px 20px;
                        border-radius: 2px;
                  }

               </style>
            </head>

            <body>
            
            <center class="wrapper">

            <table class="main" width="100%">
    
                <tr>
                    <td height="8" style="background-color: #969696;">
    
                    </td>
    
                </tr>
               
                <tr>
                  <td>
                     <table width="100%">

                           <tr>
                              <td style="text-align: center; padding: 15px">
                                 <a href="#"><img src="https://atelierdepaire.fr/images/logo2.png" alt="apparel" width="180" title="apparel"></a>
                              </td>
               
                           </tr>

                     </table>

                  </td>

               </tr>
               
               <tr>
                  <td>
                     <a href="#"><img src="https://atelierdepaire.fr/images/d.jpg" alt="" width="600" style="max-width:100%"></a>
                  </td>
               </tr>

               
               <tr>
                  <td>
                     <table width="100%">
                        <tr>
                              <td style="text-align: center; font-size: 25px; background-color:white; color: black">
                                 <p>Une commande a été passé</p>
                              </td>
                        </tr>

                     </table>
                  </td>
               </tr>
               

               <tr>
                  <td>
                     <table width="100%">
                        <tr>
                              <td class="two-columns">

            ';

            $i = 1;
            foreach (Cart::content() as $product) {
               $message .= '
               <table class="column">
               <tr>
                   <td>
                   
               ';
               $message .= "<h4 style='margin-top:-30px'>" . $product->model->title . " " . $product->options . " | " .
               $product->model->price / 100 . " euros | " . $product->qty . "quantite"
               . "</h4>";

               $message .= '
               <a href=""><img src="https://www.atelierdepaire.fr/storage/' . $product->model->image .
               
               '" alt="" width="300" style="max-width:85%; padding-bottom: 40px"></a>
               
               ';
               
               $message .= '
                     </td>
                     </tr>
               </table>
               ';


               //<h4 style="margin-top:-30px">Bracelet - 1 qte - 35 € </h4>

               // $message .= "<tr><td><strong>" . $i . "</strong> </td><td>";
               //  $message .= $product->model->title . " " . $product->options . " | ";
               //  $message .= $product->model->price / 100 . " euros | ";
               //  $message .= $product->qty . "quantite";
               //  $message .= "</td></tr>";
               //  $i++;
            }

            // $message .= '<div style="background: black; padding: 15px; text-align:center" ><img style="width: 20%" data-src="https://www.atelierdepaire.fr/images/logo2.png" alt="Marie Depaire Logo" /></div>';
            // $message .= '<table rules="all" style="border-color: #666; width: 100%" cellpadding="10">';
            $total = Cart::total() + 500;

            $message .= '
            <table width="100%">
               <tr>
                  <td style="font-size: 22px; padding: 5px">
                     <p>Total : ' . $total / 100 .  ' euros</p>
                  </td>
               </tr>

            </table>
            ';


            $message .= '
            <tr style="background-color: white;">
                  <td style="font-size: 15px; padding: 5px;">
                     <p style="margin-left: 20px">Adresse de livraison :' . $livraison->adresse . " " . $livraison->ville . " " . $livraison->codepostal . " " . $livraison->pays . '</p>
                  </td>
            </tr>
            ';

            // $message .= "<tr style='background: #eee;'><td><strong>Nom et Prenom:</strong> </td><td>" . $livraison->nom . " - " . $livraison->prenom  . "</td></tr>";
            // $message .= "<tr><td><strong>Email:</strong> </td><td>" . $livraison->email . "</td></tr>";
            // $message .= "<tr><td><strong>Adresse:</strong> </td><td>" . $livraison->adresse . "</td></tr>";
            // $message .= "<tr><td><strong>Ville:</strong> </td><td>" . $livraison->ville . "</td></tr>";
            // $message .= "<tr><td><strong>Code Postal:</strong> </td><td>" . $livraison->codepostal . "</td></tr>";
            // $message .= "<tr><td><strong>Pays:</strong> </td><td>" . $livraison->pays . "</td></tr>";


        //    $message .= "<tr><td><strong>Produits:</strong> </td><td> </td></tr>";



            // $total = Cart::total() + 500;
            // $message .= "<tr><td><strong>TOTAL: </td><td>" . $total / 100 . " euros </td></tr>";

            $message .= '
            
            </td>
            </tr>
        </table>
    </td>
</tr>

<!--  -->

<tr>
    <td style="background-color: #efefef; text-align:center">
        <table width="100%">
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique">
                    <p>BOUTIQUE</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=bracelet">
                    <p>BRACELET</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=collier">
                    <p>COLLIER</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=bague">
                    <p>BAGUE</p>
                    </a>
                </td>
            </tr>



        </table>
    </td>
</tr>

</table>

</center>


</body>




</html>
            
            ';

         

            // $message .= "</table>";
            // $message .= "</body></html>";
    
            // $headers = "From: " . $email_form . "\r\n";
            // $headers .= "MIME-Version: 1.0\r\n";
            // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $headers = 'From: ' . $email_form .'' . "\r\n" .
               'Reply-To:' . $email_form . '' . "\r\n" .
               'Return-Path: '. $email_form . '';

            // $headers = "From: " . $email_form . "\r\n";
            // $headers .='Reply-To: '. $to . "\r\n" ;
            $headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
      
            mail($to, $subject, $message, $headers);

            $to      = $livraison->email;
            $subject = "CLIENT MD";
            $email_form = 'md.website98@gmail.com';
    



    
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml-1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
               <meta http-equiv="X-UA-Compatible" content="IE=edge" />
               <meta name="viewport" content="width=device-width, initial-scale=1.0" />
               <title>Commande Confirmation</title>

               <style type="text/css">
                  body {
                        margin: 0;
                        background-color: #cccccc;
                  }
                  table {
                        border-spacing: 0;
                  }
                  td {
                        padding: 0;
                  }
                  img {
                        border: 0;
                  }
                  .wrapper {
                        width: 100%;
                        table-layout: fixed;
                        background-color: #cccccc;
                        padding-bottom: 40px;
                  }
                  .main {
                        background-color: black;
                        margin: 0 auto;
                        width: 100%;
                        max-width: 600px;
                        border-spacing: 0;
                        color: #4a4a4a;
                  }

                  .two-columns {
                        text-align: center;
                        background-color: white;
                        font-size: 0;
                        padding: 40px 0;
                  }

                  .two-columns .column{
                        width: 100%;
                        max-width: 300px;
                        display: inline-block;
                        vertical-align: top;
                        font-size: 18px;
                        padding-bottom: 40px;
                  }

                  .button {
                        background-color: #464646;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 15px 20px;
                        border-radius: 2px;
                  }

               </style>
            </head>

            <body>
            
            <center class="wrapper">

            <table class="main" width="100%">
    
                <tr>
                    <td height="8" style="background-color: #969696;">
    
                    </td>
    
                </tr>
               
                <tr>
                  <td>
                     <table width="100%">

                           <tr>
                              <td style="text-align: center; padding: 15px">
                                 <a href="#"><img src="https://atelierdepaire.fr/images/logo2.png" alt="apparel" width="180" title="logo atelier depaire"></a>
                              </td>
               
                           </tr>

                     </table>

                  </td>

               </tr>
               
               <tr>
                  <td>
                     <a href="#"><img src="https://atelierdepaire.fr/images/d.jpg" alt="atelier depaire la rochelle bordeaux" width="600" style="max-width:100%"></a>
                  </td>
               </tr>

               
               <tr>
                  <td>
                     <table width="100%">
                        <tr>
                              <td style="text-align: center; font-size: 25px; background-color:white; color: black">
                                 <p>Votre commande a été confirmé</p>
                                 <p style="font-size: 10px; margin-top: -20px">Vous allez étre livré à l\'adresse ci-dessous dans les plus brefs delais</p>

                              </td>
                        </tr>

                     </table>
                  </td>
               </tr>
               

               <tr>
                  <td>
                     <table width="100%">
                        <tr>
                              <td class="two-columns">

            ';

            $i = 1;
            foreach (Cart::content() as $product) {
               $message .= '
               <table class="column">
               <tr>
                   <td>
                   
               ';
               $message .= "<h4 style='margin-top:-30px'>" . $product->model->title . " " . $product->options . " | " .
               $product->model->price / 100 . " euros | " . $product->qty . "quantite"
               . "</h4>";

               $message .= '
               <a href=""><img src="https://www.atelierdepaire.fr/storage/' . $product->model->image .
               
               '" alt="" width="300" style="max-width:85%; padding-bottom: 40px"></a>
               
               ';
               
               $message .= '
                     </td>
                     </tr>
               </table>
               ';


               //<h4 style="margin-top:-30px">Bracelet - 1 qte - 35 € </h4>

               // $message .= "<tr><td><strong>" . $i . "</strong> </td><td>";
               //  $message .= $product->model->title . " " . $product->options . " | ";
               //  $message .= $product->model->price / 100 . " euros | ";
               //  $message .= $product->qty . "quantite";
               //  $message .= "</td></tr>";
               //  $i++;
            }

            // $message .= '<div style="background: black; padding: 15px; text-align:center" ><img style="width: 20%" data-src="https://www.atelierdepaire.fr/images/logo2.png" alt="Marie Depaire Logo" /></div>';
            // $message .= '<table rules="all" style="border-color: #666; width: 100%" cellpadding="10">';
            $total = Cart::total() + 500;

            $message .= '
            <table width="100%">
               <tr>
                  <td style="font-size: 22px; padding: 5px">
                     <p>Total : ' . $total / 100 .  ' euros</p>
                  </td>
               </tr>

            </table>
            ';


            $message .= '
            <tr style="background-color: white;">
                  <td style="font-size: 15px; padding: 5px;">
                     <p style="margin-left: 20px">Info :' . $livraison->nom . " - " . $livraison->prenom . '</p>
                     <p style="margin-left: 20px">Adresse de livraison :' . $livraison->adresse . " " . $livraison->ville . " " . $livraison->codepostal . " " . $livraison->pays . '</p>
                  </td>
            </tr>
            ';

            // $message .= "<tr style='background: #eee;'><td><strong>Nom et Prenom:</strong> </td><td>" . $livraison->nom . " - " . $livraison->prenom  . "</td></tr>";
            // $message .= "<tr><td><strong>Email:</strong> </td><td>" . $livraison->email . "</td></tr>";
            // $message .= "<tr><td><strong>Adresse:</strong> </td><td>" . $livraison->adresse . "</td></tr>";
            // $message .= "<tr><td><strong>Ville:</strong> </td><td>" . $livraison->ville . "</td></tr>";
            // $message .= "<tr><td><strong>Code Postal:</strong> </td><td>" . $livraison->codepostal . "</td></tr>";
            // $message .= "<tr><td><strong>Pays:</strong> </td><td>" . $livraison->pays . "</td></tr>";


        //    $message .= "<tr><td><strong>Produits:</strong> </td><td> </td></tr>";



            // $total = Cart::total() + 500;
            // $message .= "<tr><td><strong>TOTAL: </td><td>" . $total / 100 . " euros </td></tr>";

            $message .= '
            
            </td>
            </tr>
        </table>
    </td>
</tr>

<!--  -->

<tr>
    <td style="background-color: #efefef; text-align:center">
        <table width="100%">
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique">
                    <p>BOUTIQUE</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=bracelet">
                    <p>BRACELET</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                   <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=collier">
                    <p>COLLIER</p>
                    </a>
                </td>
            </tr>
            <tr>
                <td height="3" style="background-color: #969696;">

                </td>

            </tr>
            <tr>
                <td style="font-size: 22px; padding: 5px">
                <a style="text-decoration: none; color: black" href="https://www.atelierdepaire.fr/boutique?categorie=bague">
                    <p>BAGUE</p>
                    </a>
                </td>
            </tr>



        </table>
    </td>
</tr>

</table>

</center>


</body>




</html>
            
            ';



            // $message = '
            // <html>
            //    <head>
            //       <style>
            //          .banner-color {
            //          background-color: #eb681f;
            //          }
            //          .title-color {
            //          color: #0066cc;
            //          }
            //          .button-color {
            //          background-color: #0066cc;
            //          }
            //          @media screen and (min-width: 500px) {
            //          .banner-color {
            //          background-color: #0066cc;
            //          }
            //          .title-color {
            //          color: #eb681f;
            //          }
            //          .button-color {
            //          background-color: #eb681f;
            //          }
            //          }
            //       </style>
            //    </head>
            //    <body>
            //       <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
            //          <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //             <tbody>
            //                <tr>
            //                   <td align="center">
            //                      <center style="width:100%">
            //                         <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
            //                            <tbody>
            //                               <tr>
            //                                  <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
            //                                     <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
            //                                        <tbody>
            //                                           <tr>
            //                                              <td align="left" valign="middle" width="50%"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">Atelier Depaire</span></td>
            //                                              <td valign="middle" width="50%" align="right" style="padding:0 0 0 10px"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">' . strftime('%A %d %B %Y, %H:%M') . '</span></td>
            //                                              <td width="1">&nbsp;</td>
            //                                           </tr>
            //                                        </tbody>
            //                                     </table>
            //                                  </td>
            //                               </tr>
            //                               <tr>
            //                                  <td align="left">
            //                                     <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                        <tbody>
            //                                           <tr>
            //                                              <td width="100%">
            //                                                 <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                                    <tbody>
            //                                                       <tr>
            //                                                          <td align="center" bgcolor="black" style="padding:20px 48px;color:#ffffff; background: black;" class="banner-color">
            //                                                             <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                                                <tbody>
            //                                                                   <tr>
            //                                                                      <td align="center" width="100%">
            //                                                                         <img style="width: 40%" src="https://www.atelierdepaire.fr/images/logo2.png" alt="Marie Depaire Logo" />
            //                                                                      </td>
            //                                                                   </tr>
            //                                                                </tbody>
            //                                                             </table>
            //                                                          </td>
            //                                                       </tr>
            //                                                       <tr>
            //                                                          <td align="center" style="padding:20px 0 10px 0">
            //                                                             <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                                                <tbody>
            //                                                                   <tr>
            //                                                                      <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
            //                                                                         <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center; color: black;" class="title-color">MERCI</h3>
            //                                                                         <p style="margin: 20px 0 30px 0;font-size: 15px;text-align: center;">Vous commande a bien etait prise en compte. Vous allez etre livre a l adresse ci-dessous dans les plus brefs delais.</p>
                                                                                    
                                                                                    
            //                                                                   ';      
                                                                                    
            
            //                                     $message .= '
            
            
            //                                     <div style="width: 100%;"" class="card-header"> Livraison </div>
                                            
                                                
            //                                     <table class="table" style="border-color: black; background: white; color: black  ;border-color: #666;" cellpadding="10">
            //                                         <thead >
            //                                             <tr>
            //                                                 <th scope="col">Nom</th>
            //                                                 <th scope="col">Adresse</th>
            //                                                 <th scope="col">Ville</th>
            //                                                 <th scope="col">Code Postal</th>
            //                                                 <th scope="col">Pays</th>
            //                                             </tr>
            //                                         </thead>
                                            
                                            
            //                                 ';
                                            
            //                                 $message .= '  <tbody>
            //                                             <tr>';
                                            
            //                                 $message .= "<td>" . $livraison->nom . " - " . $livraison->prenom  . "</td>";
            //                                 $message .= "<td>" . $livraison->adresse . "</td>";
            //                                 $message .= "<td>" . $livraison->ville . "</td>";
            //                                 $message .= "<td>" . $livraison->codepostal . "</td>";
            //                                 $message .= "<td>" . $livraison->pays . "</td></tr>";
                                            
            //                                 $message .= '</tbody></table>
            //                                 ';
            
            //                                 $message .= '
            
            //                                     <div style="margin-left: 20px">
            //                                         Commande
            //                                     </div>
            //                                     <table class="table" style=" color: black  ;border-color: #666; width: 100%; border-radius: 10px; text-align: center;">
            //                                         <thead style="color: grey" class="card-header">
            //                                             <tr>
            //                                                 <th scope="col " style="color:black">#</th>
            //                                                 <th scope="col" style="color:black">Titre</th>
            //                                                 <th scope="col" style="color:black">Prix</th>
            //                                                 <th scope="col" style="color:black">Quantité</th>
            //                                             </tr>
            //                                         </thead>
                                        
            //                                         ';
            //                                         $message .= '  <tbody>
            //                                             <tr>
            //                                         ';
                                                    
            //                                         $i = 1;
            //                                         foreach (Cart::content() as $product) {
            //                                             $message .= "<td><strong>" . $i . "</strong></td>";
            //                                             $message .= "<td>" . $product->model->title . " " . $product->options . "</td> ";
            //                                             $message .= "<td>" . $product->model->price / 100 . " euros </td>";
            //                                             $message .= "<td>" . $product->qty . "quantite </td>";
            //                                             $message .= "</tr>";
            //                                             $i++;
            //                                         }
            //                                         $total = Cart::total() + 500;
            //                                         $message .= '
            //                                             <tr><td style="margin: 15px"><strong>TOTAL: </td><td>'. $total / 100 .' euros  </td></tr>
                                                    
            //                                         ';
            //                                         $message .= "</tbody></table>";
            
            
                                                                                    
                                                                                    
            //                                                                         $message .= '
                            
                             
                                                                                
            //                                                                     </td>
            //                                                                   </tr>
            //                                                                </tbody>
            //                                                             </table>
            //                                                          </td>
            //                                                       </tr>
            //                                                       <tr>
            //                                                       </tr>
            //                                                       <tr>
            //                                                       </tr>
            //                                                    </tbody>
            //                                                 </table>
            //                                              </td>
            //                                           </tr>
            //                                        </tbody>
            //                                     </table>
            
            
            // ';
            
            
            //                                 $message .= '
            //                             </td>
            //                         </tr>
            //                         <tr>
            //                            <td align="left">
            //                               <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                  <tbody>
            //                                     <tr>
            //                                        <td align="center" width="100%">
            //                                           <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                              <tbody>
            //                                                 <tr>
            //                                                    <td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px">Cordialement,
            //                                                       <br><b>Atelier Depaire</b>
            //                                                    </td>
            //                                                 </tr>
            //                                              </tbody>
            //                                           </table>
            //                                        </td>
            //                                     </tr>
            //                                     <tr>
            //                                        <td align="center" width="100%">
            //                                           <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            //                                              <tbody>
            //                                                 <tr>
            //                                                    <td align="center" style="padding:0 0 8px 0" width="100%"></td>
            //                                                 </tr>
            //                                              </tbody>
            //                                           </table>
            //                                        </td>
            //                                     </tr>
            //                                  </tbody>
            //                               </table>
            //                            </td>
            //                         </tr>
            //                      </tbody>
            //                   </table>
            //                </center>
            //             </td>
            //          </tr>
            //       </tbody>
            //    </table>
            // </div>
            // </body>
            // </html>                         
                                            
            //                                 ';

            $headers = 'From: ' . $email_form .'' . "\r\n" .
               'Reply-To:' . $email_form . '' . "\r\n" .
               'Return-Path: '. $email_form . '';

            // $headers = "From: " . $email_form . "\r\n";
            // $headers .='Reply-To: '. $to . "\r\n" ;
            $headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    

            $subject = "Atelier Depaire - Commande";

            mail($to, $subject, $message, $headers);


            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
    }

    public function livraisonStore(Request $request)
    {
        $data = new Livraison;

        $data->nom = $request['livraison']['nom'];
        $data->prenom = $request['livraison']['prenom'];
        $data->adresse = $request['livraison']['adresse'];
        $data->ville = $request['livraison']['ville'];
        $data->codepostal = $request['livraison']['codepostal'];
        $data->pays = $request['livraison']['pays'];

        if (Auth::check()) {
            $data->user_id = Auth::user()->id;
            $data->email = Auth::user()->email;
        }

        $data->save();

        return 'Livraison Enregistré';
    }

    public function thankYou()
    {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('products.index');
    }

    public function thanks()
    {
        
        Cart::destroy();
        return view('checkout.thankyou');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
