<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\URI;

class Auth implements FilterInterface
{
  /**
   * Do whatever processing this filter needs to do.
   * By default it should not return anything during
   * normal execution. However, when an abnormal state
   * is found, it should return an instance of
   * CodeIgniter\HTTP\Response. If it does, script
   * execution will end and that Response will be
   * sent back to the client, allowing for error pages,
   * redirects, etc.
   *
   * @param RequestInterface $request
   * @param array|null       $arguments
   *
   * @return RequestInterface|ResponseInterface|string|void
   */
  public function before(RequestInterface $request, $arguments = null)
  {
    // Get the URI object
    // Get the URI object

    // Allow access to the admin sign-in and register routes
    

    // Check if the user is trying to access the admin sign-in or register routes
    //   if ($uri->getPath() === '/admin/signin' || $uri->getPath() === '/admin/register') {
    //     // Check if the role query parameter is present
    //     if ($uri->getQuery('Roles') === 'admin') {
    //         return; // Allow them to pass through without checking if they're logged in
    //     }
    // }

    // Check if the user is logged in
    // if (session()->get('Roles') === 'admin') {
    //   return ; // Redirect to sign-in if not logged in
    // }else{
    //   return redirect()->to('/admin/signin'); 
    // }

    // if (session()->get('Roles') !== 'admin') {
    //   return redirect()->to('/admin/signin'); // Redirect to user sign-in if not an admin
    // }
    // if(!session()->get('isLoggedIn')){
    //   return redirect()->to('/');
    // }
  }

  /**
   * Allows After filters to inspect and modify the response
   * object as needed. This method does not allow any way
   * to stop execution of other after filters, short of
   * throwing an Exception or Error.
   *
   * @param RequestInterface  $request
   * @param ResponseInterface $response
   * @param array|null        $arguments
   *
   * @return ResponseInterface|void
   */
  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    //
  }
}
