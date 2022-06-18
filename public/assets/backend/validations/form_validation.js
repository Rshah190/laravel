var base_url = $('meta[name="base-url"]').attr('content') + '/admin';
var csrf_token = $('meta[name="csrf-token"]').attr('content');


/***************delete User**********/
function deleteUser(id) {
   Swal.fire({
      icon: 'warning',
      title: 'Are you sure you want to delete this record?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes'
   }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         $.ajax({
            type: 'post',
            headers: {
               'X-CSRF-TOKEN': csrf_token
            },
            url: base_url + '/delete/user',
            data: {
               'user_id': id
            },
            success: function (response, textStatus, xhr) {
               console.log(response.message);

               Swal.fire({
                  icon: response.icon,
                  title: response.message,
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: response.confirmButtonText
               }).then((result) => {
                  window.location = base_url + '/list/users';
               });


            }
         });
      }
   });

}
/**************Block User***********/
function BlockUnblockUser(id,type)
{
    if(type == 0)
    {
        var block_status='block';
        var title_icon='warning';
    }
    else
    {
        var block_status='unblock';
        var title_icon='primary';

    }
    Swal.fire({
        title: 'Are you sure?',
        text:'You want to'+' '+block_status,
        icon: title_icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes,' +block_status+' it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                headers: {
                   'X-CSRF-TOKEN': csrf_token
                },
                url: base_url + '/block/user',
                data: {
                   'user_id': id,
                   'type_id':type
                },
                success: function (response, textStatus, xhr) {

                    Swal.fire({
                        icon: response.icon,
                        title: response.message,
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: response.title
                     }).then((result) => {
                        window.location = base_url + '/list/users';
                     });
                }
            })
        }
      })
}
/**********delete Category**********/
function deleteCategory(id)
{
   Swal.fire({
      icon: 'warning',
      title: 'Are you sure you want to delete this record?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes'
   }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         $.ajax({
            type: 'post',
            headers: {
               'X-CSRF-TOKEN': csrf_token
            },
            url: base_url + '/delete/category',
            data: {
               'category_id': id
            },
            success: function (response, textStatus, xhr) {
               console.log(response.message);

               Swal.fire({
                  icon: response.icon,
                  title: response.message,
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: response.confirmButtonText
               }).then((result) => {
                  window.location = base_url + '/list/categories';
               });


            }
         });
      }
   });


}
/*****************delete Shop*******/
function deleteShop(id)
{
   Swal.fire({
      icon: 'warning',
      title: 'Are you sure you want to delete this record?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes'
   }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         $.ajax({
            type: 'post',
            headers: {
               'X-CSRF-TOKEN': csrf_token
            },
            url: base_url + '/delete/shop',
            data: {
               'shop_id': id
            },
            success: function (response, textStatus, xhr) {
               console.log(response.message);

               Swal.fire({
                  icon: response.icon,
                  title: response.message,
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: response.confirmButtonText
               }).then((result) => {
                  window.location = base_url + '/list/shops';
               });


            }
         });
      }
   });


}
/**************Block Ads***********/
function BlockUnblockAd(id,type)
{
   if(type == 0)
   {
       var block_status='block';
       var title_icon='warning';
   }
   else
   {
       var block_status='unblock';
       var title_icon='primary';

   }
   Swal.fire({
       title: 'Are you sure?',
       text:'You want to'+' '+block_status,
       icon: title_icon,
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes,' +block_status+' it!'
     }).then((result) => {
       if (result.isConfirmed) {
           $.ajax({
               type: 'post',
               headers: {
                  'X-CSRF-TOKEN': csrf_token
               },
               url: base_url + '/block/ad',
               data: {
                  'ad_id': id,
                  'type_id':type
               },
               success: function (response, textStatus, xhr) {

                   Swal.fire({
                       icon: response.icon,
                       title: response.message,
                       showDenyButton: false,
                       showCancelButton: false,
                       confirmButtonText: response.title
                    }).then((result) => {
                       window.location = base_url + '/list/ads';
                    });
               }
           })
       }
     })

}
/**********delete Ads************/
function deleteAd(id)
{
   Swal.fire({
      icon: 'warning',
      title: 'Are you sure you want to delete this record?',
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Yes'
   }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
         $.ajax({
            type: 'post',
            headers: {
               'X-CSRF-TOKEN': csrf_token
            },
            url: base_url + '/delete/ad',
            data: {
               'ad_id': id
            },
            success: function (response, textStatus, xhr) {
               console.log(response.message);

               Swal.fire({
                  icon: response.icon,
                  title: response.message,
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: response.confirmButtonText
               }).then((result) => {
                  window.location = base_url + '/list/ads';
               });


            }
         });
      }
   });
}