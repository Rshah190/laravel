
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>



    <style>
        .text-danger strong {
            color: #9f181c;
        }
        
        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #305430;
            border-top: 12px solid #004400;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }
        .done{
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 0px 16px;
            margin-right: 16px;
        }
        .dtwo{
            margin-bottom: 20px;
            padding: 0px 16px;
            margin-right: 16px;
        }
    </style>



</head>

<body>


    <div class="receipt-main" style="max-width:600px; margin: auto; overflow: hidden;">

        <table style="width:100%">
            <thead>
                <tr>
                    <td style="width:50%; vertical-align: top;">
                        <div class="done">
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                        </div>
                    </td>
                    <td style="width:50%; vertical-align: top;">
                        <div class="done">
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                        </div>
                    </td>

                    <!-- <td style="width:50%; vertical-align: top;">
                        <div class="dtwo">
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                            <p><strong>Date:</strong>Lorem Ipsum is simply dummy text</p>
                        </div>
                    </td>
 -->

                </tr>
            </thead>
            <tbody>
                <tr>                  
                </tr>

                <tr>
                   <td style="width:60%; overflow: hidden;"><img src="{{asset('assets/backend/car1.png')}}" width="100%" alt=""></td>
                   <td style="width:40%; overflow: hidden;"><img src="{{asset('assets/backend/car2.png')}}" width="100%" alt=""></td>
                </tr>

                <tr>
                   <td style="width:60%; overflow: hidden;"><img src="{{asset('assets/backend/car1.png')}}" width="100%" alt=""></td>
                   <td style="width:40%; overflow: hidden;"><img src="{{asset('assets/backend/car2.png')}}" width="100%" alt=""></td>
                </tr>
                <tr>
                   <td style="width:100%; overflow: hidden;"><img src="{{asset('assets/backend/car.png')}}" width="100%" alt=""></td>
                </tr>
                <tr>
                    <td style="border:1px solid #ccc; padding:0 16px; width: 100%;" colspan="2">
                        <p><strong>Lorem Ipsum is simply dummy text:</strong>Lorem Ipsum is simply dummy text</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </td>
                </tr>
            </tbody>           
            <tfoot>
                <tr>
                    <td style="width:50%; border-right: 1px solid #000; padding: 10px;"><h3>Lorem Ipsum  </h3></td>
                    <td  style="width:50%; padding: 10px;"><h3>Lorem Ipsum </h3></td>
                 </tr>
            </tfoot>
        </table>

    </div>
    </div>
    </div>



</body>

</html>