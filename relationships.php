<?php
function getAttributes($type) {
 return '{
    "name": "fx:attributes",
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
          {"name": "fx:' . $type . '"}
        ]
      }
     ]
    }';
}
function getCoupon($multiple = false) {
    return '{
                   "name": "' . (($multiple) ? '.. { example entry } ..' : 'fx__coupon') . '",
                   "children": [
                     {"name": "self"},
                     {"name": "fx:store"},
                     {"name": "fx:generate_codes"},
                     {
                      "name": "fx:coupon_codes",
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
                                 {"name": "fx:store"},
                                 {"name": "fx:coupon"},
                                 {"name": "fx:coupon_code_transactions"}
                              ]
                          }
                      ]
                     },
                     {"name": "fx:coupon_item_categories"}
                   ]
                  }
        ';
}
function getTemplate($type) {
return '{
               "name": "fx:' . $type . '_template",
               "children": [
                  {"name": "self"},
                  {"name": "fx:store"},
                  {"name": "fx:template_sets"},
                  {"name": "fx:cache"}
               ]
       }';
}
function getCustomer() {
     return '{
             "name": "fx:customer",
             "children": [
                {"name": "self"},
                ' . getAttributes('customer') . ',
                {"name": "fx:store"},
                {
                 "name": "fx:default_billing_address",
                 "children": [
                  {"name": "self"},
                  {"name": "fx:store"},
                  {"name": "fx:customer"},
                  {"name": "fx:customer_addresses"}
                 ]
                },
                {
                 "name": "fx:default_shipping_address",
                 "children": [
                  {"name": "self"},
                  {"name": "fx:store"},
                  {"name": "fx:customer"},
                  {"name": "fx:customer_addresses"}
                 ]
                },
                {
                 "name": "fx:default_payment_method",
                 "children": [
                  {"name": "self"},
                  {"name": "fx:store"},
                  {"name": "fx:customer"}
                 ]
                },
                {
                 "name": "fx:transactions",
                  "children": [
                    {"name": "self"},
                    {"name": "first"},
                    {"name": "prev"},
                    {"name": "next"},
                    {"name": "last"}
                  ]
                },
                {
                    "name": "fx:subscriptions",
                    "children": [
                     {"name": "self"},
                     {"name": "first"},
                     {"name": "prev"},
                     {"name": "next"},
                     {"name": "last"}
                    ]
                },
                {
                 "name": "fx:customer_addresses",
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
                       {"name": "fx:store"},
                       {"name": "fx:customer"}
                    ]
                  }
                 ]
                }
             ]
            }';
}

function getItemCategory($multiple = false) {
         return '{
                    "name": "fx:' . (($multiple) ? '.. { example entry } ..' : 'item_category') . '",
                    "children": [
                      {"name": "self"},
                      {"name": "fx:store"},
                      {"name": "fx:downloadables"},
                      {"name": "fx:admin_email_template"},
                      {"name": "fx:customer_email_template"},
                      {
                       "name": "fx:email_templates",
                       "children": [
                        {"name": "self"},
                        {"name": "first"},
                        {"name": "prev"},
                        {"name": "next"},
                        {"name": "last"}
                       ]
                      },
                      {
                       "name": "fx:tax_item_categories",
                       "children": [
                          {"name": "self"},
                          {"name": "fx:store"},
                          {"name": "fx:item_category"},
                          {
                           "name": "fx:tax",
                           "children": [
                              {"name": "self"},
                              {"name": "fx:store"},
                              {"name": "fx:tax_item_categories"}
                           ]
                          }
                       ]
                      }
                    ]
                  }';
}
/*
if (strpos(__DIR__,'luke') !== false) {
    include '/home/luke/code/hypermedia-api/src/FoxyCart/Services/LinkRelationsService.php';
} else {
    include '/srv/foxy/code/hypermedia-api/src/FoxyCart/Services/LinkRelationsService.php';
}
*/
include __DIR__ . '/../../src/FoxyCart/Services/LinkRelationsService.php';
$rel_values = \FoxyCart\Services\LinkRelationsService::$rel_values;
$rels = '{"name": "self"},' . "\n";
foreach($rel_values as $rel => $description) {
    $rels .= '{"name": "fx:' . $rel . '"},' . "\n";
}
$rels = trim($rels, ",\n");
?>
{
 "name": "/",
 "children": [
  {"name": "self"},
  {
  "name": "fx:property_helpers",
   "children": [
    {"name": "self"},
    {
        "name": "fx:alternate_payment_methods",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:checkout_types",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:customer_password_hash_types",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:default_templates",
        "children": [
         {"name": "self"},
         {"name": "fx:cart_templates"},
         {"name": "fx:checkout_templates"},
         {"name": "fx:receipt_templates"},
         {"name": "fx:email_templates"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:languages",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:language_strings",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:locales",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:payment_gateway_types",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
       "name": "fx:shipping_methods",
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
             {"name": "fx:shipping_methods"},
             {"name": "fx:shipping_services"},
             {"name": "fx:shipping_containers"},
             {"name": "fx:shipping_drop_types"},
             {"name": "fx:property_helpers"}
            ]
          }
       ]
    },
    {
        "name": "fx:shipping_address_types",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:countries",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
        "name": "fx:regions",
        "children": [
         {"name": "self"},
         {"name": "fx:countries"},
         {"name": "fx:property_helpers"}
        ]
    },
    {
       "name": "fx:store_versions",
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
             {"name": "fx:store_versions"},
             {"name": "fx:property_helpers"}
            ]
          }
       ]
    },
    {
        "name": "fx:timezones",
        "children": [
         {"name": "self"},
         {"name": "fx:property_helpers"}
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
   "name": "fx:reporting",
   "children": [
    {"name": "self"},
    {"name": "fx:reporting_store_domain_exists"},
    {"name": "fx:reporting_email_exists"}
   ]
  },
  {
    "name": "fx:create_client"
  },
  {
    "name": "fx:client",
    "children": [
        {"name": "self"},
        <?php print getAttributes('client'); ?>
    ]
  },
  {
    "name": "fx:create_user"
  },
  {
   "name": "fx:user",
   "children": [
    {"name": "self"},
    <?php print getAttributes('user'); ?>,
    {"name": "default_store"},
    {
     "name": "fx:stores",
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
    "name": "fx:store",
    "children": [
        {"name": "self"},
        <?php print getAttributes('store'); ?>,
        {"name": "fx:store_version"},
        {
         "name": "fx:users",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"}
         ]
        },
        {
        "name": "fx:user_accesses",
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
              {"name": "fx:store"},
              {"name": "fx:user"}
            ]
          }
         ]
        },
        {
        "name": "fx:customers",
         "children": [
          {"name": "self"},
          {"name": "first"},
          {"name": "prev"},
          {"name": "next"},
          {"name": "last"}
         ]
        },
        {
         "name": "fx:carts",
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
              {"name": "fx:store"},
              <?php print getCustomer(); ?>,
              {"name": "fx:subscription"},
              {
               "name": "fx:items",
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
                   {"name": "fx:store"},
                   {"name": "fx:cart"},
                   {"name": "fx:item_category"},
                   {
                    "name": "fx:item_options",
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
                          {"name": "fx:store"},
                          {"name": "fx:transaction"},
                          {"name": "fx:item"}
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
         "name": "fx:transactions",
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
              {"name": "fx:store"},
              {"name": "fx:receipt"},
              <?php print getCustomer(); ?>,
              {"name": "fx:subscription"},
              {
               "name": "fx:items",
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
                   {"name": "fx:store"},
                   {"name": "fx:transaction"},
                   <?php print getItemCategory(); ?>,
                   {"name": "fx:subscription"},
                   {
                   "name": "fx:item_options",
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
                          {"name": "fx:store"},
                          {"name": "fx:transaction"},
                          {"name": "fx:item"}
                       ]
                      }
                   ]
                  },
                  {"name": "fx:downloadable_purchase"},
                  {"name": "fx:shipment"}
                ]
              }
             ]
            },
            {
             "name": "fx:payments",
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
                  {"name": "fx:store"},
                  {"name": "fx:transaction"}
                ]
              }
             ]
            },
            {
             "name": "fx:applied_taxes",
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
                  {"name": "fx:store"},
                  {"name": "fx:transaction"},
                  {"name": "fx:tax"}
                ]
              }
             ]
            },
            {
             "name": "fx:custom_fields",
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
                  {"name": "fx:store"},
                  {"name": "fx:transaction"}
                ]
              }
             ]
            },
            {
             "name": "fx:discounts",
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
                  {"name": "fx:store"},
                  {"name": "fx:transaction"},
                  {"name": "fx:customer"},
                  <?php print getCoupon(); ?>,
                  {"name": "fx:coupon_code"}
                ]
              }
             ]
            },
            {
             "name": "fx:shipments",
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
                  {"name": "fx:store"},
                  {"name": "fx:custom_fields"},
                  {"name": "fx:items"},
                  {"name": "fx:transaction"},
                  {"name": "fx:shipments"},
                  {"name": "fx:customer"},
                  {"name": "fx:customer_address"}
                ]
              }
             ]
            },
            {
             "name": "fx:billing_addresses",
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
                  {"name": "fx:store"},
                  {"name": "fx:transaction"},
                  {"name": "fx:billing_addresses"},
                  {"name": "fx:customer"},
                  {"name": "fx:customer_address"}
                ]
              }
             ]
            }
           ]
          }
        ]
       },
        {
          "name": "fx:subscriptions",
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
                     {"name": "fx:store"},
                     {"name": "fx:customer"},
                     {"name": "fx:original_transaction"},
                     {"name": "fx:last_transaction"},
                     {"name": "fx:transaction_template"},
                     {"name": "fx:sub_token_url"}
                  ]
              }
          ]
        },
        {"name": "fx:subscription_settings"},
        {
          "name": "fx:item_categories",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"},
              <?php print getItemCategory(true); ?>
          ]
        },
        {
          "name": "fx:taxes",
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
                  {"name": "fx:store"},
                  {"name": "fx:tax_item_categories"}
                ]
              }
          ]
        },
        {
          "name": "fx:payment_method_sets",
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
                  {"name": "fx:store"},
                  {"name": "fx:payment_method_sets"},
                  {
                    "name": "fx:payment_gateway",
                    "children": [
                        {"name": "self"},
                        {"name": "fx:store"},
                        {"name": "fx:payment_method_sets"}
                    ]
                  },
                  {
                    "name": "fx:payment_method_set_alternate_payment_methods",
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
                              {"name": "fx:store"},
                              {"name": "fx:payment_method_set"},
                              {
                                "name": "fx:alternate_payment_method",
                                "children": [
                                  {"name": "self"},
                                  {"name": "fx:store"},
                                  {"name": "fx:payment_method_sets"}
                                ]
                              }
                           ]
                        }
                    ]
                  },
                  {
                    "name": "fx:payment_method_set_fraud_protections",
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
                              {"name": "fx:store"},
                              {"name": "fx:payment_method_set"},
                              {
                                "name": "fx:fraud_protection",
                                "children": [
                                  {"name": "self"},
                                  {"name": "fx:store"},
                                  {"name": "fx:payment_method_sets"}
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
          "name": "fx:coupons",
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
          "name": "fx:template_sets",
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
                  {"name": "fx:store"},
                  <?php print getTemplate('cart'); ?>,
                  <?php print getTemplate('cart_include'); ?>,
                  <?php print getTemplate('checkout'); ?>,
                  <?php print getTemplate('receipt'); ?>,
                  <?php print getTemplate('email'); ?>,
                  {
                    "name": "fx:language_overrides",
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
                            {"name": "fx:language_overrides"},
                            {"name": "fx:template_set"}
                          ]
                        }
                    ]
                  }
                ]
              }
          ]
        },
        {
         "name": "fx:cart_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]
        },
        {
         "name": "fx:cart_include_templates",
         "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
         ]
        },
        {
          "name": "fx:checkout_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]
        },
        {
          "name": "fx:receipt_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]
        },
        {
          "name": "fx:email_templates",
          "children": [
              {"name": "self"},
              {"name": "first"},
              {"name": "prev"},
              {"name": "next"},
              {"name": "last"}
          ]
        },
        {
          "name": "fx:error_entries",
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
                  {"name": "fx:store"},
                  {"name": "fx:customer_id"},
                  {"name": "fx:transaction_id"},
                  {"name": "fx:subscription_id"}
                ]
              }
          ]
        },
        {
          "name": "fx:downloadables",
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
                  {"name": "fx:store"},
                  {"name": "fx:item_category"},
                  {"name": "fx:downloadable_item_categories"}
                ]
              }
          ]
        },
        {
          "name": "fx:alternate_payment_methods",
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
                  {"name": "fx:store"},
                  {"name": "fx:payment_method_sets"}
                ]
              }
          ]
        },
        {
          "name": "fx:fraud_protections",
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
                  {"name": "fx:store"},
                  {"name": "fx:payment_method_sets"}
                ]
              }
          ]
        }
    ]
  },
  {
    "name": "fx:stores",
    "children": [
      {"name": "self"},
      {"name": "first"},
      {"name": "prev"},
      {"name": "next"},
      {"name": "last"}
    ]
  },
  {
    "name": "fx:token"
  }
 ]
}