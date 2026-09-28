<?php
/**
 * Template Name: Machine Finder
 */

get_header();
?>

<style>
.az-finder-page {
    background: #f7f8fa;
    padding: 80px 6%;
    min-height: 70vh;
}

.az-finder-wrap {
    max-width: 1100px;
    margin: 0 auto;
}

.az-finder-hero {
    text-align: center;
    margin-bottom: 50px;
}

.az-finder-hero h1 {
    margin: 0 0 15px;
    font-size: 46px;
    line-height: 1.15;
    color: #111;
}

.az-finder-hero p {
    max-width: 720px;
    margin: 0 auto;
    font-size: 18px;
    line-height: 1.7;
    color: #666;
}

.az-finder-card {
    background: #fff;
    border-radius: 18px;
    padding: 45px;
    box-shadow: 0 12px 40px rgba(0,0,0,.07);
}

.az-finder-progress {
    margin-bottom: 35px;
}

.az-finder-progress-top {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 10px;
    font-size: 14px;
    font-weight: 700;
    color: #555;
}

.az-finder-progress-bar {
    width: 100%;
    height: 8px;
    background: #e9e9e9;
    border-radius: 20px;
    overflow: hidden;
}

.az-finder-progress-fill {
    width: 9%;
    height: 100%;
    background: #b88a2d;
    border-radius: 20px;
    transition: width .3s ease;
}

.az-finder-step {
    display: none;
}

.az-finder-step.active {
    display: block;
}

.az-finder-step h2 {
    margin: 0 0 10px;
    font-size: 28px;
    color: #111;
}

.az-finder-step p {
    margin: 0 0 28px;
    color: #666;
}

.az-finder-options {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.az-finder-option {
    display: flex;
    align-items: center;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 12px;
    background: #fff;
    cursor: pointer;
    transition: .2s ease;
}

.az-finder-option:hover {
    border-color: #b88a2d;
    transform: translateY(-2px);
}

.az-finder-option input {
    margin-right: 12px;
}

.az-finder-option span {
    font-weight: 600;
    color: #222;
}

.az-finder-buttons {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 35px;
}

.az-finder-btn {
    border: 0;
    border-radius: 10px;
    padding: 15px 28px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
}

.az-finder-prev {
    background: #eee;
    color: #222;
}

.az-finder-next {
    background: #111;
    color: #fff;
}

.az-finder-next:hover {
    background: #b88a2d;
}

.az-finder-prev:hover {
    background: #ddd;
}

.az-finder-note {
    margin-top: 25px;
    text-align: center;
    font-size: 14px;
    color: #777;
}

@media (max-width: 700px) {
    .az-finder-page {
        padding: 55px 5%;
    }

    .az-finder-card {
        padding: 25px 20px;
    }

    .az-finder-hero h1 {
        font-size: 34px;
    }

    .az-finder-options {
        grid-template-columns: 1fr;
    }

    .az-finder-buttons {
        flex-direction: column-reverse;
    }

    .az-finder-btn {
        width: 100%;
    }
}
</style>

<main class="az-finder-page">

    <div class="az-finder-wrap">

        <div class="az-finder-hero">
            <h1>Find the Right Machine</h1>
            <p>
                Answer a few simple questions and we'll help you find
                the office machine that best matches your requirements.
            </p>
        </div>

        <div class="az-finder-card">

            <div class="az-finder-progress">

                <div class="az-finder-progress-top">
                    <span id="az-finder-step-label">Question 1 of 11</span>
                    <span id="az-finder-percent">9%</span>
                </div>

                <div class="az-finder-progress-bar">
                    <div
                        class="az-finder-progress-fill"
                        id="az-finder-progress-fill">
                    </div>
                </div>

            </div>


            <!-- QUESTION 1 -->

            <div class="az-finder-step active">

                <h2>What type of machine are you looking for?</h2>

                <p>Select the type that best matches your requirement.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="machine_type" value="Photocopier">
                        <span>Photocopier / MFP</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="machine_type" value="Printer">
                        <span>Printer</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="machine_type" value="Interactive Display">
                        <span>Interactive Display</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="machine_type" value="CCTV">
                        <span>CCTV</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 2 -->

            <div class="az-finder-step">

                <h2>What is your monthly print volume?</h2>

                <p>This helps us avoid recommending a machine below your workload.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="monthly_volume" value="Below 1000">
                        <span>Below 1,000 pages</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="monthly_volume" value="1000-5000">
                        <span>1,000 – 5,000 pages</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="monthly_volume" value="5000-10000">
                        <span>5,000 – 10,000 pages</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="monthly_volume" value="10000+">
                        <span>10,000+ pages</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 3 -->

            <div class="az-finder-step">

                <h2>Do you need colour printing?</h2>

                <p>Choose the output type you require.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="output" value="B&W">
                        <span>Black & White</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="output" value="Colour">
                        <span>Colour</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="output" value="Both">
                        <span>Both</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 4 -->

            <div class="az-finder-step">

                <h2>What paper size do you need?</h2>

                <p>Select the largest paper size required.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="paper_size" value="A4">
                        <span>A4</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="paper_size" value="A3">
                        <span>A3</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="paper_size" value="A3+">
                        <span>A3+</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 5 -->

            <div class="az-finder-step">

                <h2>What speed do you need?</h2>

                <p>Choose the approximate print speed.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="speed" value="Low">
                        <span>Basic / Low Speed</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="speed" value="Medium">
                        <span>Medium Speed</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="speed" value="High">
                        <span>High Speed</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 6 -->

            <div class="az-finder-step">

                <h2>Do you need duplex printing?</h2>

                <p>Duplex means automatic double-sided printing.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="duplex" value="Yes">
                        <span>Yes</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="duplex" value="No">
                        <span>No</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="duplex" value="Not Sure">
                        <span>Not Sure</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 7 -->

            <div class="az-finder-step">

                <h2>Do you need scanning?</h2>

                <p>Choose your scanning requirement.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="scanner" value="Yes">
                        <span>Yes – Scanner Required</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="scanner" value="No">
                        <span>No</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="scanner" value="Not Sure">
                        <span>Not Sure</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 8 -->

            <div class="az-finder-step">

                <h2>What is your preferred condition?</h2>

                <p>Choose between new and reconditioned equipment.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="condition" value="New">
                        <span>New Machine</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="condition" value="Reconditioned">
                        <span>Reconditioned Machine</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="condition" value="Not Sure">
                        <span>Not Sure</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 9 -->

            <div class="az-finder-step">

                <h2>What is your budget?</h2>

                <p>Choose an approximate budget range.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="budget" value="Below 50000">
                        <span>Below ₹50,000</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="budget" value="50000-100000">
                        <span>₹50,000 – ₹1,00,000</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="budget" value="100000+">
                        <span>₹1,00,000+</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="budget" value="Not Sure">
                        <span>Not Sure</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 10 -->

            <div class="az-finder-step">

                <h2>How would you like to get the machine?</h2>

                <p>Select your preferred option.</p>

                <div class="az-finder-options">

                    <label class="az-finder-option">
                        <input type="radio" name="purchase_type" value="Buy">
                        <span>Buy</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="purchase_type" value="Rent">
                        <span>Rent</span>
                    </label>

                    <label class="az-finder-option">
                        <input type="radio" name="purchase_type" value="Not Sure">
                        <span>Not Sure</span>
                    </label>

                </div>

            </div>


            <!-- QUESTION 11 -->

            <div class="az-finder-step">

                <h2>How can we contact you?</h2>

                <p>Enter your details so our team can recommend suitable machines.</p>

                <div style="display:grid;gap:15px;">

                    <input
                        type="text"
                        id="finder_name"
                        placeholder="Your Name"
                        style="width:100%;padding:16px;border:1px solid #ddd;border-radius:10px;box-sizing:border-box;"
                    >

                    <input
                        type="tel"
                        id="finder_phone"
                        placeholder="Mobile Number"
                        style="width:100%;padding:16px;border:1px solid #ddd;border-radius:10px;box-sizing:border-box;"
                    >

                </div>

            </div>


            <div class="az-finder-buttons">

                <button
                    type="button"
                    class="az-finder-btn az-finder-prev"
                    id="az-finder-prev"
                    style="display:none;">
                    ← Previous
                </button>

                <button
                    type="button"
                    class="az-finder-btn az-finder-next"
                    id="az-finder-next">
                    Next →
                </button>

            </div>

            <div class="az-finder-note">
                Not sure what you need? Don't worry — our team can help you choose.
            </div>

        </div>

    </div>

</main>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const steps = document.querySelectorAll('.az-finder-step');
    const nextBtn = document.getElementById('az-finder-next');
    const prevBtn = document.getElementById('az-finder-prev');

    const progressFill = document.getElementById('az-finder-progress-fill');
    const stepLabel = document.getElementById('az-finder-step-label');
    const percentLabel = document.getElementById('az-finder-percent');

    let currentStep = 0;

    function updateFinder() {

        steps.forEach(function(step, index) {
            step.classList.toggle('active', index === currentStep);
        });

        const currentNumber = currentStep + 1;
        const total = steps.length;
        const percentage = Math.round((currentNumber / total) * 100);

        stepLabel.textContent =
            'Question ' + currentNumber + ' of ' + total;

        percentLabel.textContent =
            percentage + '%';

        progressFill.style.width =
            percentage + '%';

        prevBtn.style.display =
            currentStep === 0 ? 'none' : 'block';

        nextBtn.textContent =
            currentStep === total - 1
                ? 'Get My Recommendations →'
                : 'Next →';
    }


    function getFinderAnswers() {

        const answers = {};

        const radioGroups = [
            'machine_type',
            'monthly_volume',
            'output',
            'paper_size',
            'speed',
            'duplex',
            'scanner',
            'condition',
            'budget',
            'purchase_type'
        ];

        radioGroups.forEach(function(name) {

            const selected = document.querySelector(
                'input[name="' + name + '"]:checked'
            );

            answers[name] = selected
                ? selected.value
                : '';

        });

        answers.name =
            document.getElementById('finder_name').value.trim();

        answers.phone =
            document.getElementById('finder_phone').value.trim();

        return answers;
    }


    function submitFinder() {

        const answers = getFinderAnswers();

        if (!answers.name || !answers.phone) {

            alert(
                'Please enter your name and mobile number.'
            );

            return;
        }

        nextBtn.disabled = true;
        nextBtn.textContent = 'Finding Machines...';

        const formData = new FormData();

        formData.append(
            'action',
            'az_machine_finder_recommendations'
        );

        formData.append(
            'answers',
            JSON.stringify(answers)
        );

        fetch(
            '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
            {
                method: 'POST',
                body: formData
            }
        )
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {

            if (
                !data.success ||
                !data.data ||
                !data.data.recommendations
            ) {

                throw new Error(
                    'No recommendations received.'
                );
            }

            showRecommendations(
                data.data.recommendations
            );

        })
        .catch(function(error) {

            console.error(error);

            alert(
                'Something went wrong while finding machines. Please try again.'
            );

            nextBtn.disabled = false;

            nextBtn.textContent =
                'Get My Recommendations →';
        });

    }


    function showRecommendations(recommendations) {

        const finderCard =
            document.querySelector('.az-finder-card');

        let html = '';

        html += `
            <div class="az-finder-results">

                <div style="text-align:center;margin-bottom:35px;">

                    <h2 style="margin:0 0 10px;font-size:32px;color:#111;">
                        Your Machine Recommendations
                    </h2>

                    <p style="margin:0;color:#666;">
                        Based on the requirements you provided,
                        here are some machines to consider.
                    </p>

                </div>

                <div style="
                    display:grid;
                    grid-template-columns:repeat(3,1fr);
                    gap:20px;
                ">
        `;

        recommendations.forEach(function(machine, index) {

            let label = 'Recommended Option';

            if (index === 0) {
                label = 'Best Match';
            } else if (index === 1) {
                label = 'Budget Option';
            } else if (index === 2) {
                label = 'Premium Option';
            }

            const whatsappMessage =
                encodeURIComponent(
                    'Hello AZ Office Automation, I am interested in ' +
                    machine.name +
                    '. Please share details and quotation.'
                );

            const whatsappUrl =
                'https://wa.me/918553202432?text=' +
                whatsappMessage;

            html += `

                <div style="
                    border:1px solid #e1e1e1;
                    border-radius:14px;
                    overflow:hidden;
                    background:#fff;
                    box-shadow:0 8px 25px rgba(0,0,0,.06);
                ">

                    ${
                        machine.image
                        ?
                        `<img
                            src="${machine.image}"
                            alt="${machine.name}"
                            style="
                                width:100%;
                                height:190px;
                                object-fit:contain;
                                background:#f7f7f7;
                            "
                        >`
                        :
                        `<div style="
                            height:190px;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            background:#f5f5f5;
                            color:#888;
                        ">
                            Machine Image
                        </div>`
                    }

                    <div style="padding:22px;">

                        <div style="
                            display:inline-block;
                            margin-bottom:12px;
                            padding:6px 10px;
                            border-radius:20px;
                            background:#f3ead8;
                            color:#8b6826;
                            font-size:12px;
                            font-weight:700;
                        ">
                            ${label}
                        </div>

                        <h3 style="
                            margin:0 0 12px;
                            font-size:20px;
                            line-height:1.35;
                            color:#111;
                        ">
                            ${machine.name}
                        </h3>

                        ${
                            machine.recommended_volume
                            ?
                            `<p style="
                                margin:0 0 15px;
                                color:#666;
                                font-size:14px;
                            ">
                                Recommended volume:
                                <strong>
                                    ${machine.recommended_volume.toLocaleString()}
                                </strong>
                                pages/month
                            </p>`
                            :
                            ''
                        }

                        <a
                            href="${machine.url}"
                            style="
                                display:block;
                                text-align:center;
                                padding:13px;
                                border-radius:8px;
                                background:#111;
                                color:#fff;
                                text-decoration:none;
                                font-weight:700;
                                margin-bottom:10px;
                            "
                        >
                            View Machine
                        </a>

                        <a
                            href="${whatsappUrl}"
                            target="_blank"
                            rel="noopener"
                            style="
                                display:block;
                                text-align:center;
                                padding:13px;
                                border-radius:8px;
                                background:#25D366;
                                color:#fff;
                                text-decoration:none;
                                font-weight:700;
                            "
                        >
                            WhatsApp Enquiry
                        </a>

                    </div>

                </div>
            `;
        });

        html += `
                </div>

                <div style="
                    text-align:center;
                    margin-top:35px;
                ">

                    <a
                        href="<?php echo esc_url(home_url('/contact/')); ?>"
                        style="
                            display:inline-block;
                            padding:15px 28px;
                            background:#b88a2d;
                            color:#fff;
                            border-radius:9px;
                            text-decoration:none;
                            font-weight:700;
                        "
                    >
                        Get a Quote
                    </a>

                </div>

            </div>
        `;

        finderCard.innerHTML = html;

        window.scrollTo({
            top: finderCard.offsetTop - 30,
            behavior: 'smooth'
        });
    }


    nextBtn.addEventListener('click', function () {

        if (currentStep < steps.length - 1) {

            currentStep++;

            updateFinder();

            window.scrollTo({
                top:
                    document.querySelector('.az-finder-card').offsetTop - 30,
                behavior: 'smooth'
            });

        } else {

            submitFinder();

        }

    });


    prevBtn.addEventListener('click', function () {

        if (currentStep > 0) {

            currentStep--;

            updateFinder();

            window.scrollTo({
                top:
                    document.querySelector('.az-finder-card').offsetTop - 30,
                behavior: 'smooth'
            });

        }

    });


    updateFinder();

});
</script>

<?php get_footer(); ?>