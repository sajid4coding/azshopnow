<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'blog_title' => "About'AZ Shop Now' Multi-Vendor eCommerce Subscription",
            'description' =>"Multi-Vendor eCommerce Subscription refers to a business model in which an eCommerce platform charges vendors a monthly or annual fee for the privilege of selling their products on the platform. Unlike the commission model, in which the platform earns revenue from a percentage of each sale, the subscription model generates income from the recurring fees paid by the vendors.

            With a Multi-Vendor eCommerce Subscription model, vendors have the opportunity to create their own online store and list their products for sale without having to worry about the technical and operational aspects of running an eCommerce platform. The platform owner takes care of website management, customer support, payment processing, and security, among other things.

            The subscription fee charged by the platform owner can vary depending on the level of service provided, with higher fees often offering more advanced features and benefits to the vendor. For example, some platforms may offer a basic subscription package with limited features and a lower fee, while a premium subscription may offer more storage space, custom branding, and other advanced features.

            Multi-Vendor eCommerce Subscription is a useful model for both the platform owner and the vendors. The platform owner can generate a predictable and recurring income stream from the subscription fees, while vendors benefit from having access to a ready-made online marketplace with a large customer base. Additionally, because vendors are not dependent on making sales to generate income, they are free to focus on creating and promoting their products, making this model an attractive option for small businesses and entrepreneurs.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About'AZ Shop Now' Multi-Vendor eCommerce Subscription",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Subscription refers to a business model in which an eCommerce platform charges vendors a monthly or annual fee for the privilege of selling their products on the platform. Unlike the commission model, in which the platform earns revenue from a percentage of each sale, the subscription model generates income from the recurring fees paid by the vendors.

            With a Multi-Vendor eCommerce Subscription model, vendors have the opportunity to create their own online store and list their products for sale without having to worry about the technical and operational aspects of running an eCommerce platform. The platform owner takes care of website management, customer support, payment processing, and security, among other things.

            The subscription fee charged by the platform owner can vary depending on the level of service provided, with higher fees often offering more advanced features and benefits to the vendor. For example, some platforms may offer a basic subscription package with limited features and a lower fee, while a premium subscription may offer more storage space, custom branding, and other advanced features.

            Multi-Vendor eCommerce Subscription is a useful model for both the platform owner and the vendors. The platform owner can generate a predictable and recurring income stream from the subscription fees, while vendors benefit from having access to a ready-made online marketplace with a large customer base. Additionally, because vendors are not dependent on making sales to generate income, they are free to focus on creating and promoting their products, making this model an attractive option for small businesses and entrepreneurs.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'Seller Commission'",
            'description' => "About'AZ Shop Now' Multi-Vendor eCommerce Subscription",
            'description' =>"Multi-Vendor eCommerce Subscription refers to a business model in which an eCommerce platform charges vendors a monthly or annual fee for the privilege of selling their products on the platform. Unlike the commission model, in which the platform earns revenue from a percentage of each sale, the subscription model generates income from the recurring fees paid by the vendors.

            With a Multi-Vendor eCommerce Subscription model, vendors have the opportunity to create their own online store and list their products for sale without having to worry about the technical and operational aspects of running an eCommerce platform. The platform owner takes care of website management, customer support, payment processing, and security, among other things.

            The subscription fee charged by the platform owner can vary depending on the level of service provided, with higher fees often offering more advanced features and benefits to the vendor. For example, some platforms may offer a basic subscription package with limited features and a lower fee, while a premium subscription may offer more storage space, custom branding, and other advanced features.

            Multi-Vendor eCommerce Subscription is a useful model for both the platform owner and the vendors. The platform owner can generate a predictable and recurring income stream from the subscription fees, while vendors benefit from having access to a ready-made online marketplace with a large customer base. Additionally, because vendors are not dependent on making sales to generate income, they are free to focus on creating and promoting their products, making this model an attractive option for small businesses and entrepreneurs.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Commission'",
            'Meta_Tag_Description' => 'Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.Use these category-specific fields for health & beauty products in your catalog.',
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'AZ Shop Seller' Multi-Vendor eCommerce Commission",
            'description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.
            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'AZ Shop Seller' eCommerce Commission",
            'description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.
            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "About - 'AZ Shop Seller'",
            'description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.
            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "AZ Shop Seller Account",
            'description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.
            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
        DB::table('blogs')->insert([
            'blog_title' => "'AZ Shop Now' - Customer Support",
            'description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'category' => 'AZ Shop Now',
            'blog_photo' => NULL,
            'status' => 'published',
            'Meta_Tag_Title' => "About - 'Seller Subscription'",
            'Meta_Tag_Description' => "Multi-Vendor eCommerce Commission refers to a business model in which an eCommerce platform allows multiple vendors or sellers to sell their products through a single online store. The platform owner earns revenue by charging each seller a commission fee on every sale made through the website. This commission fee is a percentage of the total sale value and may vary depending on the agreement between the platform owner and the seller.

            Multi-Vendor eCommerce Commission provides a cost-effective way for small businesses and entrepreneurs to sell their products online, as they do not need to invest in building and maintaining their own online store. It also provides a centralized platform for customers to shop from multiple vendors in one place, increasing their convenience and the variety of products available.

            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.
            The platform owner is responsible for managing the website, handling customer service and support, and ensuring the security of the transactions. In return, the platform owner earns a commission on every sale made through the website, making this model a lucrative business opportunity for those with the technical skills and expertise to run an eCommerce platform.

            Overall, Multi-Vendor eCommerce Commission provides a win-win solution for both the platform owner and the sellers, as it allows for a cost-effective and convenient way for small businesses to reach a wider audience and for the platform owner to earn a passive income.",
            'Meta_Tag_Keywords'=>'',
            'created_at' => now()
        ]);
    }
}
