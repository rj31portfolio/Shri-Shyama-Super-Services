<?php include 'includes/header.php'; ?>

<?php
// FAQs Section
$domain = "https://shrishyamass.com/";
$address = "Khasra No. 230 Nangli Sakrawati, Industrial Area, Najafgarh, New Delhi, Delhi 110043";
?>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Frequently Asked Questions (FAQs)</h2>
        <div class="accordion" id="faqsAccordion">

            <!-- Question 1 -->
            <div class="accordion-item mb-3">
                <h3 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                        What types of machines do you manufacture and supply?
                    </button>
                </h3>
                <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#faqsAccordion">
                    <div class="accordion-body">
                        We manufacture and supply a wide range of machines, including Spring Coiling Machines, Wire Forming Machines, Wire Bending Machines, Spring End Grinding Machines, and Furnaces. We also provide refurbished and pre-owned machines.
                    </div>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="accordion-item mb-3">
                <h3 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                        Do you provide installation and training services?
                    </button>
                </h3>
                <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqsAccordion">
                    <div class="accordion-body">
                        Yes, we offer professional installation services and provide operator training to ensure smooth operations and optimal performance of the machinery.
                    </div>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="accordion-item mb-3">
                <h3 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                        Can I purchase refurbished or used machines?
                    </button>
                </h3>
                <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqsAccordion">
                    <div class="accordion-body">
                        Absolutely. We offer high-quality refurbished and pre-owned machines that undergo thorough testing and performance checks to meet your needs at an affordable cost.
                    </div>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="accordion-item mb-3">
                <h3 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                        Where is your business located?
                    </button>
                </h3>
                <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#faqsAccordion">
                    <div class="accordion-body">
                        Our business is located at <?php echo $address; ?>. You are welcome to visit us for more information and assistance.
                    </div>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="accordion-item mb-3">
                <h3 class="accordion-header" id="faqHeadingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                        How can I contact you for more information?
                    </button>
                </h3>
                <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#faqsAccordion">
                    <div class="accordion-body">
                        You can contact us via email at <a href="mailto:info@shrishyamass.com" class="text-primary">info@shrishyamass.com</a> or call us at <a href="tel:+918700335277" class="text-primary">+918700335277</a>. We are here to assist you.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>