<?php

namespace Database\Seeders;

use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomPage::create([
            'title' => 'Terms and Policy',
            'slug' => 'terms-policy',
            'meta_title' => 'Terms and Conditions - Our Company Policies and User Agreement',
            'meta_description' => 'Read our Terms and Conditions to understand the rules, responsibilities, and policies governing the use of our website and services.',
            'meta_keywords' => 'terms and conditions, user agreement, privacy policy, website rules, service policy',
            'status' => 1,
            'body' => '
            <h2>Terms and Conditions</h2>
            <p>Welcome to our website. By accessing or using our services, you agree to comply with and be bound by the following Terms and Conditions. Please read them carefully before using our website or services.</p>

            <h3>1. Acceptance of Terms</h3>
            <p>By using this website, you confirm that you have read, understood, and agree to these Terms and Conditions. If you do not agree, please refrain from using our site or services.</p>

            <h3>2. Use of Our Website</h3>
            <p>You agree to use our website only for lawful purposes and in a way that does not infringe the rights of, restrict, or inhibit anyone else\'s use and enjoyment of the website. Unauthorized use of this website may result in legal action.</p>

            <h3>3. Intellectual Property</h3>
            <p>All content, design, logos, graphics, and other materials on this website are the property of our company or its licensors. You may not reproduce, distribute, or use any material without prior written consent.</p>

            <h3>4. Limitation of Liability</h3>
            <p>We strive to provide accurate and up-to-date information. However, we make no warranties or representations about the completeness or accuracy of any content. We are not liable for any direct, indirect, or consequential damages arising from the use of this website or its content.</p>

            <h3>5. External Links</h3>
            <p>Our website may contain links to third-party websites for your convenience. We are not responsible for the content, policies, or practices of those sites and encourage you to review their terms before using them.</p>

            <h3>6. Privacy</h3>
            <p>Your privacy is important to us. Please review our <a href="/privacy-policy">Privacy Policy</a> to understand how we collect, use, and protect your information.</p>

            <h3>7. Modifications to the Terms</h3>
            <p>We reserve the right to update or modify these Terms and Conditions at any time without prior notice. Your continued use of the website constitutes acceptance of any changes.</p>

            <h3>8. Governing Law</h3>
            <p>These Terms and Conditions are governed by and construed in accordance with the laws of [Your Country/State]. Any disputes arising shall be subject to the exclusive jurisdiction of the local courts.</p>

            <h3>9. Contact Us</h3>
            <p>If you have any questions or concerns about these Terms and Conditions, please contact us at <a href="mailto:info@yourcompany.com">info@yourcompany.com</a>.</p>
            ',

                ]);
            }
}
