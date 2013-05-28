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
                                 {"name": "coupon"},
                                 {"name": "coupon_code_transactions"}
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
                      {"name": "downloadables"},
                      {"name": "admin_email_template"},
                      {"name": "customer_email_template"},
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

if (strpos(__DIR__,'luke') !== false) {
    include '/home/luke/code/hypermedia-api/src/FoxyCart/Services/LinkRelationsService.php';
} else {
    include '/srv/foxy/code/hypermedia-api/src/FoxyCart/Services/LinkRelationsService.php';
}
$rel_values = \FoxyCart\Services\LinkRelationsService::$rel_values;
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
  "name": "property_helpers", 
   "children": [
    {"name": "self"},
    {
        "name": "alternate_payment_methods",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "checkout_types",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "customer_password_hash_types",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "default_templates",
        "children": [
         {"name": "self"},
         {"name": "cart_templates"},
         {"name": "checkout_templates"},
         {"name": "receipt_templates"},
         {"name": "email_templates"},
         {"name": "property_helpers"}
        ]        
    },
    {
        "name": "languages",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "language_strings",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "locales",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "payment_gateway_types",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
       "name": "shipping_methods",
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
             {"name": "shipping_methods"},
             {"name": "shipping_services"},
             {"name": "shipping_containers"},
             {"name": "shipping_drop_types"},
             {"name": "property_helpers"}
            ]
          }
       ]
    },
    {
        "name": "shipping_address_types",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "countries",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    },
    {
        "name": "regions",
        "children": [
         {"name": "self"},
         {"name": "countries"},
         {"name": "property_helpers"}
        ]
    },
    {
       "name": "store_versions",
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
             {"name": "store_versions"},
             {"name": "property_helpers"}
            ]
          }
       ]
    },
    {
        "name": "timezones",
        "children": [
         {"name": "self"},
         {"name": "property_helpers"}
        ]
    }
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
        {"name": "store_versions"},
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
                   },
                   {"name":"shipment"}
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
                   {"name": "subscription"},
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
              },
              {"name": "downloadable_purchase"},
              {"name": "shipment"}
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
             "name": "shipments",
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
                  {"name": "products"},
                  {"name": "transaction"},
                  {"name": "shipments"},
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
                  {
                    "name": "payment_gateway",
                    "children": [
                        {"name": "self"},
                        {"name": "store"},
                        {"name": "payment_method_sets"}
                    ]
                  },
                  {
                    "name": "payment_method_set_alternate_payment_methods",
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
                              {"name": "payment_method_set"},
                              {
                                "name": "alternate_payment_method",
                                "children": [
                                  {"name": "self"},
                                  {"name": "store"},
                                  {"name": "payment_method_sets"}
                                ]
                              }
                           ]
                        }
                    ]
                  },
                  {
                    "name": "payment_method_set_fraud_protections",
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
                              {"name": "payment_method_set"},
                              {
                                "name": "fraud_protection",
                                "children": [
                                  {"name": "self"},
                                  {"name": "store"},
                                  {"name": "payment_method_sets"}
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
              <?php print getTemplate('email_include'); ?>,
                {
                  "name": "language_overrides",
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
                          {"name": "language_overrides"},
                          {"name": "template_set"}
                        ]
                      }
                  ]          
                }              
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
        },
        {
          "name": "error_entries",
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
                  {"name": "customer_id"},
                  {"name": "transaction_id"},
                  {"name": "subscription_id"}
                ]
              }
          ]          
        },
        {
          "name": "downloadables",
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
                  {"name": "product_category"},
                  {"name": "downloadable_product_categories"}
                ]
              }
          ]          
        },
        {
          "name": "alternate_payment_methods",
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
                  {"name": "payment_method_sets"}
                ]
              }
          ]          
        },
        {
          "name": "fraud_protections",
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
                  {"name": "payment_method_sets"}
                ]
              }
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