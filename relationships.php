<?php
function getAttributes($type) {
 return '{
    "name": "attributes",
     "children": [
      {"name": "self"},
      {"name": "first"},
      {"name": "prev"},
      {"name": "next"},
      {"name": "last"},
      {
      "name": ".. { example entry } ..",
      "children": [
          {"name": "self"},
          {"name": "' . $type . '"}
        ]
      }
     ]
    }';
}
function getCoupon($multiple = false) {
    return '{
                   "name": "' . (($multiple) ? '.. { example entry } ..' : 'coupon') . '",
                   "children": [
                     {"name": "self"},
                     {"name": "store"},
                     {
                      "name": "coupon_codes",
                      "children": [
                          {"name": "self"},
                          {"name": "first"},
                          {"name": "prev"},
                          {"name": "next"},
                          {"name": "last"},
                          {
                              "name": ".. { example entry } ..",
                              "children": [
                                 {"name": "self"},
                                 {"name": "store"},
                                 {"name": "coupon"}
                              ]
                          }
                      ]
                     },
                     {"name": "coupon_product_categories"}
                   ]
                  }
        ';
}
function getTemplate($type) {
return '{
               "name": "' . $type . '_template",
               "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "template_sets"}
               ]
       }';
}
function getCustomer() {
     return '{
             "name": "customer",
             "children": [
                {"name": "self"},
                ' . getAttributes('customer') . ',
                {"name": "store"},
                {
                 "name": "default_billing_address",
                 "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "customer"},
                  {"name": "customer_addresses"}
                 ]
                },
                {
                 "name": "default_shipping_address",
                 "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "customer"},
                  {"name": "customer_addresses"}
                 ]
                },
                {
                 "name": "default_payment_method",
                 "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "customer"}
                 ]
                },
                {
                 "name": "transactions",
                  "children": [
                    {"name": "self"},
                    {"name": "first"},
                    {"name": "prev"},
                    {"name": "next"},
                    {"name": "last"}
                  ]
                },
                {
                    "name": "subscriptions",
                    "children": [
                     {"name": "self"},
                     {"name": "first"},
                     {"name": "prev"},
                     {"name": "next"},
                     {"name": "last"}
                    ]
                },
                {
                 "name": "customer_addresses",
                 "children": [
                  {"name": "self"},
                  {"name": "first"},
                  {"name": "prev"},
                  {"name": "next"},
                  {"name": "last"},
                  {
                    "name": ".. { example entry } ..",
                    "children": [
                       {"name": "self"},
                       {"name": "store"},
                       {"name": "customer"}
                    ]
                  }
                 ]
                }
             ]
            }';
}

function getProductCategory($multiple = false) {
         return '{
                    "name": "' . (($multiple) ? '.. { example entry } ..' : 'product_category') . '",
                    "children": [
                      {"name": "self"},
                      {"name": "store"},
                      {
                       "name": "email_templates",
                       "children": [
                        {"name": "self"},
                        {"name": "first"},
                        {"name": "prev"},
                        {"name": "next"},
                        {"name": "last"}
                       ]
                      },
                      {
                       "name": "tax_product_categories",
                       "children": [
                          {"name": "self"},
                          {"name": "store"},
                          {"name": "product_category"},
                          {
                           "name": "tax",
                           "children": [
                              {"name": "self"},
                              {"name": "store"},
                              {"name": "tax_product_categories"}
                           ]
                          }
                       ]
                      }
                    ]
                  }';
}

include __DIR__ . '/../v/1.0.0/api/includes/rel_values.php';
$rels = '{"name": "self"},' . "\n";
foreach($rel_values as $rel => $description) {
    $rels .= '{"name": "' . $rel . '"},' . "\n";
}
$rels = trim($rels, ",\n");
?>
{
 "name": "/",
 "children": [
  {"name": "self"},
  {
  "name": "resources", 
   "children": [
    {"name": "self"},
    {"name": "checkout_types"},
    {"name": "customer_password_hash_types"},
    {"name": "default_templates"},
    {"name": "languages"},
    {"name": "language_strings"},
    {"name": "locales"},
    {"name": "payment_method_gateway_types"},
    {"name": "shipping_methods"},
    {"name": "shipping_address_types"},
    {"name": "countries"},
    {"name": "regions"},
    {"name": "store_versions"},
    {"name": "timezones"}
   ]
  },
  {
   "name": "rels",
   "children": [
    <?php print $rels; ?>
   ]
  },
  {
    "name": "create_client"
  },
  {
    "name": "client",
    "children": [
        {"name": "self"},
        <?php print getAttributes('client'); ?>
    ]
  },
  {
    "name": "create_user"
  },
  {
   "name": "user",
   "children": [
    {"name": "self"},
    <?php print getAttributes('user'); ?>,
    {
     "name": "stores",
     "children": [
      {"name": "self"},
      {"name": "first"},
      {"name": "prev"},
      {"name": "next"},
      {"name": "last"}
     ]
    }
   ]
  },
  {
    "name": "store",
    "children": [
        {"name": "self"},
        <?php print getAttributes('store'); ?>,
        {
         "name": "users",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"}
         ]
        },
        {
        "name": "user_accesses",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"},
          {
          "name": ".. { example entry } ..",
          "children": [
              {"name": "self"},
              {"name": "store"},
              {"name": "user"}
            ]
          }
         ]
        },      
        {
        "name": "customers",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"}
         ]
        },      
        {
         "name": "carts",
        "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"},
          {
            "name": ".. { example entry } ..",
            "children": [
              {"name": "self"},
              <?php print getAttributes('cart'); ?>,
              {"name": "store"},
              <?php print getCustomer(); ?>,
              {"name": "subscription"},
              {
               "name": "products",
               "children": [
                {"name": "self"},
                {"name": "first"},
                {"name": "prev"},
                {"name": "next"},
                {"name": "last"},
                {
                 "name": ".. { example entry } ..",
                 "children": [
                   {"name": "self"},
                   {"name": "store"},
                   {"name": "cart"},
                   {"name": "product_category"},
                   {
                    "name": "product_options",
                    "children": [
                      {"name": "self"},
                      {"name": "first"},
                      {"name": "prev"},
                      {"name": "next"},
                      {"name": "last"},
                      {
                       "name": ".. { example entry } ..",
                       "children": [
                          {"name": "self"},
                          {"name": "store"},
                          {"name": "transaction"},
                          {"name": "product"}
                       ]
                      }
                    ]
                   }
                 ]
                }
               ]
              }
            ] 
          }
        ]
         
         
        },
        {
         "name": "transactions",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"},
          {
            "name": ".. { example entry } ..",
            "children": [
              {"name": "self"},
              <?php print getAttributes('transaction'); ?>,
              {"name": "store"},
              {"name": "receipt"},
              <?php print getCustomer(); ?>,
              {"name": "subscription"},
              {
               "name": "products",
               "children": [
                {"name": "self"},
                {"name": "first"},
                {"name": "prev"},
                {"name": "next"},
                {"name": "last"},
                {
                 "name": ".. { example entry } ..",
                 "children": [
                   {"name": "self"},
                   {"name": "store"},
                   {"name": "transaction"},
                   <?php print getProductCategory(); ?>,
                  {
                   "name": "product_options",
                   "children": [
                      {"name": "self"},
                      {"name": "first"},
                      {"name": "prev"},
                      {"name": "next"},
                      {"name": "last"},
                      {
                       "name": ".. { example entry } ..",
                       "children": [
                          {"name": "self"},
                          {"name": "store"},
                          {"name": "transaction"},
                          {"name": "product"}
                       ]
                      }
                   ]
                  }
                ]
              }
             ]
            },
            {
             "name": "payments",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "transaction"}
                ]
              }
             ]
            },
            {
             "name": "applied_taxes",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "transaction"},
                  {"name": "tax"}
                ]
              }
             ]
            },
            {
             "name": "custom_fields",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "transaction"}
                ]
              }
             ]
            },
            {
             "name": "discounts",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "transaction"},
                  {"name": "customer"},
                  <?php print getCoupon(); ?>,
                  {"name": "coupon_code"}
                ]
              }
             ]
            },
            {
             "name": "shipping_addresses",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "custom_fields"},
                  {"name": "transaction"},
                  {"name": "shipping_addresses"},
                  {"name": "customer"},
                  {"name": "customer_address"}
                ]
              }
             ]
            },
            {
             "name": "billing_addresses",
             "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
              "name": ".. { example entry } ..",
              "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "transaction"},
                  {"name": "billing_addresses"},
                  {"name": "customer"},
                  {"name": "customer_address"}
                ]
              }
             ]
            }            
           ]
          }  
        ]
       },        
        {
          "name": "subscriptions",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
                  "name": ".. { example entry } ..",
                  "children": [
                     {"name": "self"},
                   <?php print getAttributes('subscription'); ?>,
                     {"name": "store"},
                     {"name": "customer"},
                     {"name": "original_transaction"},
                     {"name": "last_transaction"},
                     {"name": "transaction_template"}
                  ]
              }
          ]
        },        
        {"name": "subscription_settings"},
        {
          "name": "product_categories",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              <?php print getProductCategory(true); ?>
          ]
        },      
        {
          "name": "taxes",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
                "name": ".. { example entry } ..",
                "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "tax_product_categories"}
                ]
              }        
          ]
        },
        {
          "name": "payment_method_sets",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              {
                "name": ".. { example entry } ..",
                "children": [
                  {"name": "self"},
                  {"name": "store"},
                  {"name": "payment_method_sets"},
                  {"name": "payment_method_gateway"},
                  {"name": "payment_method_paypal_express"},
                  {"name": "payment_method_minfraud"}                ]
              }        
          ]
        },
        {
          "name": "coupons",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              <?php print getCoupon(true); ?>
          ]
        },      
        {
          "name": "template_sets",
          "children": [
              {"name": "self"},
              {"name": "store"},
              <?php print getTemplate('cart'); ?>,
              <?php print getTemplate('cart_include'); ?>,
              <?php print getTemplate('checkout_include'); ?>,
              <?php print getTemplate('receipt_include'); ?>,
              <?php print getTemplate('email_include'); ?>
            ]
          },       
        {
         "name": "cart_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]
        },
        {
         "name": "cart_include_templates",
         "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
         ]
        },
        {
          "name": "checkout_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]          
        },
        {
          "name": "receipt_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]          
        },
        {
          "name": "email_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]          
        }    
    ]
  },
  {
    "name": "stores",
    "children": [
      {"name": "self"},
      {"name": "first"},
      {"name": "prev"},
      {"name": "next"},
      {"name": "last"}
    ]
  },
  {
    "name": "token"
  }
 ]
}