document.addEventListener("DOMContentLoaded", function () {

    console.log("AZ Office Automation website loaded successfully.");

    /* =========================================================
       AZ OFFICE AUTOMATION — MACHINE FINDER
       11 QUESTIONS + WORDPRESS MACHINE API
    ========================================================= */

    const finderQuestions = [

        {
            question: "What type of business do you have?",
            options: [
                ["Office / Corporate", "Business and corporate workplace"],
                ["School / College", "Education and academic use"],
                ["Hospital / Clinic", "Healthcare and medical use"],
                ["Printing or DTP shop", "Commercial printing"],
                ["Advocate / CA", "Professional office"],
                ["Government", "Government department"],
                ["Retail / Showroom", "Retail and customer-facing business"],
                ["Home or small office", "Light office usage"]
            ]
        },

        {
            question: "What is your monthly print volume?",
            options: [
                ["Under 2,000", "Light monthly printing"],
                ["2,000 to 10,000", "Low to medium volume"],
                ["10,000 to 30,000", "Medium volume"],
                ["30,000 to 1,00,000", "High volume"],
                ["Above 1,00,000", "Very high volume"]
            ]
        },

        {
            question: "What type of output do you need?",
            options: [
                ["Black & White only", "Mono documents"],
                ["Colour", "Colour documents and marketing"],
                ["Both", "Black & white and colour"]
            ]
        },

        {
            question: "What paper size do you need?",
            options: [
                ["A4 only", "Standard office documents"],
                ["A3 and A4", "Large-format office documents"]
            ]
        },

        {
            question: "What printing speed do you need?",
            options: [
                ["Basic", "Under 25 ppm"],
                ["Medium", "25 to 45 ppm"],
                ["High", "45 ppm and above"]
            ]
        },

        {
            question: "Which features do you require?",
            multiple: true,
            options: [
                ["Scan to email or PDF", "Digital document workflows"],
                ["Duplex", "Automatic two-sided printing"],
                ["Network / WiFi", "Shared workplace printing"],
                ["Fax", "Fax communication"],
                ["ADF", "Automatic document feeder"],
                ["Stapler or finisher", "Professional finishing"],
                ["Booklet making", "Booklet production"],
                ["Mobile print", "Print from mobile devices"],
                ["ID card copy", "ID and card copying"]
            ]
        },

        {
            question: "Do you want a new or reconditioned machine?",
            options: [
                ["New", "Brand-new machine"],
                ["Reconditioned", "Professionally serviced machine"],
                ["Show me both", "Compare both options"]
            ]
        },

        {
            question: "How would you like to purchase?",
            options: [
                ["Outright purchase", "Buy the machine"],
                ["Monthly rental", "Fixed monthly rental"],
                ["CPC", "Pay per copy"],
                ["Not sure, please advise", "Let our team recommend the best option"]
            ]
        },

        {
            question: "What is your budget?",
            options: [
                ["Under Rs.25,000", "Entry-level budget"],
                ["Rs.25,000 to 60,000", "Value segment"],
                ["Rs.60,000 to 1.5 lakh", "Mid-range"],
                ["Rs.1.5 lakh to 4 lakh", "Premium segment"],
                ["Above Rs.4 lakh", "Enterprise segment"],
                ["Rental only", "I prefer rental"]
            ]
        },

        {
            question: "What is your location or pincode?",
            input: true,
            placeholder: "Enter your 6-digit pincode"
        },

        {
            question: "When do you need the machine?",
            options: [
                ["Immediately", "I need a machine now"],
                ["Within a month", "Planning within 30 days"],
                ["Just researching", "I'm exploring my options"]
            ]
        }

    ];


    /* =========================================================
       FINDER ELEMENTS
    ========================================================= */

    const questionElement =
        document.getElementById("finder-question");

    const optionsElement =
        document.getElementById("finder-options");

    const stepLabel =
        document.getElementById("finder-step-label");

    const progressPercent =
        document.getElementById("finder-progress-percent");

    const progressBar =
        document.getElementById("finder-progress-bar");

    const currentElement =
        document.getElementById("finder-current");

    const backButton =
        document.getElementById("finder-back");


    if (!questionElement || !optionsElement) {
        console.log("Machine Finder not present on this page.");
        return;
    }


    /* =========================================================
       STATE
    ========================================================= */

    let currentStep = 0;

    let answers = {
        businessType: "",
        monthlyVolume: "",
        output: "",
        paperSize: "",
        speed: "",
        features: [],
        condition: "",
        purchase: "",
        budget: "",
        pincode: "",
        timeline: "",
        name: "",
        mobile: ""
    };


    let allMachines = [];


    /* =========================================================
       HELPERS
    ========================================================= */

    function escapeHtml(value) {

        if (value === null || value === undefined) {
            return "";
        }

        return String(value)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }


    function parseNumber(value) {

        if (value === null || value === undefined) {
            return 0;
        }

        const cleaned = String(value)
            .replace(/₹/g, "")
            .replace(/Rs\./gi, "")
            .replace(/,/g, "")
            .replace(/[^\d.]/g, "");

        return parseFloat(cleaned) || 0;
    }


    function getVolumeRequirement() {

        switch (answers.monthlyVolume) {

            case 0:
                return 2000;

            case 1:
                return 10000;

            case 2:
                return 30000;

            case 3:
                return 100000;

            case 4:
                return 100000;

            default:
                return 0;
        }
    }


    function getMinimumSpeed() {

        switch (answers.speed) {

            case 0:
                return 0;

            case 1:
                return 25;

            case 2:
                return 45;

            default:
                return 0;
        }
    }


    function getBudgetRange() {

        switch (answers.budget) {

            case 0:
                return { min: 0, max: 25000 };

            case 1:
                return { min: 25000, max: 60000 };

            case 2:
                return { min: 60000, max: 150000 };

            case 3:
                return { min: 150000, max: 400000 };

            case 4:
                return { min: 400000, max: Infinity };

            default:
                return { min: 0, max: Infinity };
        }
    }


    function machineVolume(machine) {

        return Math.max(
            parseNumber(machine.recommended_volume),
            parseNumber(machine.monthly_volume)
        );
    }


    function machinePrice(machine) {

        return parseNumber(machine.sale_price);
    }


    function machineSpeed(machine) {

        return parseNumber(machine.speed);
    }


    /* =========================================================
       OUTPUT MATCH
    ========================================================= */

    function outputMatches(machine) {

        const required = answers.output;

        if (!required) {
            return true;
        }

        const machineOutput =
            String(machine.output || "").toLowerCase();

        if (required === "Black & White only") {

            return (
                machineOutput.includes("b&w") ||
                machineOutput.includes("black") ||
                machineOutput.includes("both")
            );
        }

        if (required === "Colour") {

            return (
                machineOutput.includes("colour") ||
                machineOutput.includes("color") ||
                machineOutput.includes("both")
            );
        }

        if (required === "Both") {

            return machineOutput.includes("both");
        }

        return true;
    }


    /* =========================================================
       PAPER SIZE MATCH
    ========================================================= */

    function paperMatches(machine) {

        if (answers.paperSize === "") {
            return true;
        }

        const paper =
            String(machine.paper_size || "").toLowerCase();

        if (answers.paperSize === "A4 only") {

            return (
                paper.includes("a4") ||
                paper.includes("a3 & a4")
            );
        }

        if (answers.paperSize === "A3 and A4") {

            return (
                paper.includes("a3") &&
                paper.includes("a4")
            );
        }

        return true;
    }


    /* =========================================================
       CONDITION MATCH
    ========================================================= */

    function conditionMatches(machine) {

        if (!answers.condition) {
            return true;
        }

        const machineCondition =
            String(machine.condition || "").toLowerCase();

        if (answers.condition === "New") {

            return machineCondition === "new";
        }

        if (answers.condition === "Reconditioned") {

            return machineCondition === "reconditioned";
        }

        if (answers.condition === "Show me both") {

            return true;
        }

        return true;
    }


    /* =========================================================
       REQUIRED FEATURES
    ========================================================= */

    function featureScore(machine) {

        if (!Array.isArray(answers.features)) {
            return 0;
        }

        let score = 0;

        const featureMap = {

            "Scan to email or PDF": [
                "scan",
                "network"
            ],

            "Duplex": [
                "duplex"
            ],

            "Network / WiFi": [
                "network",
                "wifi"
            ],

            "Fax": [
                "fax"
            ],

            "ADF": [
                "adf"
            ],

            "Stapler or finisher": [
                "finisher"
            ],

            "Booklet making": [
                "finisher"
            ],

            "Mobile print": [
                "mobile_print"
            ],

            "ID card copy": []
        };


        answers.features.forEach(function (featureIndex) {

            const selectedFeature =
                finderQuestions[5].options[featureIndex][0];

            const keys =
                featureMap[selectedFeature] || [];


            if (
                keys.some(function (key) {
                    return String(machine[key] || "")
                        .toLowerCase() === "yes";
                })
            ) {

                score += 10;
            }

        });

        return score;
    }


    /* =========================================================
       PURCHASE MATCH
    ========================================================= */

    function purchaseScore(machine) {

        let score = 0;

        if (answers.purchase === "Monthly rental") {

            if (parseNumber(machine.rental_month) > 0) {
                score += 20;
            }
        }

        if (answers.purchase === "CPC") {

            if (
                parseNumber(machine.cpc_bw) > 0 ||
                parseNumber(machine.cpc_colour) > 0
            ) {
                score += 20;
            }
        }

        if (answers.purchase === "Outright purchase") {

            if (machinePrice(machine) > 0) {
                score += 20;
            }
        }

        if (answers.purchase === "Not sure, please advise") {

            if (
                parseNumber(machine.rental_month) > 0 ||
                parseNumber(machine.cpc_bw) > 0 ||
                parseNumber(machine.cpc_colour) > 0
            ) {
                score += 20;
            }
        }

        return score;
    }


    /* =========================================================
       MAIN MACHINE SCORING
    ========================================================= */

    function scoreMachine(machine) {

        const requiredVolume =
            getVolumeRequirement();

        const requiredSpeed =
            getMinimumSpeed();


        const machineVolumeValue =
            machineVolume(machine);

        const machineSpeedValue =
            machineSpeed(machine);


        /*
         * IMPORTANT:
         * Never recommend a machine below the required
         * monthly print volume.
         */

        if (
            requiredVolume > 0 &&
            machineVolumeValue > 0 &&
            machineVolumeValue < requiredVolume
        ) {
            return -999999;
        }


        let score = 0;


        /* Volume */

        if (requiredVolume > 0) {

            if (machineVolumeValue >= requiredVolume) {
                score += 40;
            }

        }


        /* Speed */

        if (requiredSpeed > 0) {

            if (machineSpeedValue >= requiredSpeed) {
                score += 20;
            }

        }


        /* Output */

        if (outputMatches(machine)) {
            score += 15;
        }


        /* Paper */

        if (paperMatches(machine)) {
            score += 10;
        }


        /* Condition */

        if (conditionMatches(machine)) {
            score += 10;
        }


        /* Features */

        score += featureScore(machine);


        /* Purchase */

        score += purchaseScore(machine);


        /* Budget */

        const budget =
            getBudgetRange();

        const price =
            machinePrice(machine);


        if (
            price > 0 &&
            price >= budget.min &&
            price <= budget.max
        ) {

            score += 20;

        }


        return score;
    }


    /* =========================================================
       LOAD MACHINES FROM WORDPRESS
    ========================================================= */

    async function loadMachines() {

        try {

            const response =
                await fetch(
                    "/wp-json/az/v1/machines",
                    {
                        method: "GET",
                        headers: {
                            "Accept": "application/json"
                        }
                    }
                );


            if (!response.ok) {

                throw new Error(
                    "Machine API returned an error."
                );

            }


            const data =
                await response.json();


            if (Array.isArray(data)) {

                allMachines = data;

            } else {

                allMachines = [];

            }


            console.log(
                "AZ Machine Finder loaded machines:",
                allMachines.length
            );


        } catch (error) {

            console.error(
                "Machine Finder API error:",
                error
            );

            allMachines = [];

        }

    }


    /* =========================================================
       FIND RECOMMENDATIONS
    ========================================================= */

    function findRecommendations() {

        if (!allMachines.length) {
            return {
                best: null,
                budget: null,
                premium: null
            };
        }


        const scoredMachines =
            allMachines
                .map(function (machine) {

                    return {
                        machine: machine,
                        score: scoreMachine(machine)
                    };

                })
                .filter(function (item) {

                    return item.score > -999999;

                })
                .sort(function (a, b) {

                    return b.score - a.score;

                });


        if (!scoredMachines.length) {

            return {
                best: null,
                budget: null,
                premium: null
            };
        }


        const best =
            scoredMachines[0].machine;


        const budgetRange =
            getBudgetRange();


        let budgetOption =
            scoredMachines.find(function (item) {

                const price =
                    machinePrice(item.machine);

                return (
                    price > 0 &&
                    price >= budgetRange.min &&
                    price <= budgetRange.max
                );

            });


        if (!budgetOption) {

            budgetOption =
                scoredMachines[scoredMachines.length - 1];

        }


        let premiumOption =
            scoredMachines
                .slice()
                .sort(function (a, b) {

                    return (
                        machinePrice(b.machine) -
                        machinePrice(a.machine)
                    );

                })
                .find(function (item) {

                    return item.machine.id !== best.id;

                });


        if (!premiumOption) {

            premiumOption =
                scoredMachines[0];

        }


        return {

            best: best,

            budget: budgetOption
                ? budgetOption.machine
                : null,

            premium: premiumOption
                ? premiumOption.machine
                : null

        };

    }


    /* =========================================================
       RENDER FINDER
    ========================================================= */

    function renderFinder() {

        const question =
            finderQuestions[currentStep];

        const stepNumber =
            currentStep + 1;
            const questionNumberElement =
    document.querySelector(".finder-question-number");

if (questionNumberElement) {
    questionNumberElement.textContent =
        `QUESTION ${String(stepNumber).padStart(2, "0")}`;
}


        const progress =
            Math.round(
                (stepNumber /
                    finderQuestions.length) *
                100
            );


        questionElement.textContent =
            question.question;


        stepLabel.textContent =
            `STEP ${stepNumber} OF ${finderQuestions.length}`;


        progressPercent.textContent =
            `${progress}%`;


        progressBar.style.width =
            `${progress}%`;


        currentElement.textContent =
            `${stepNumber} / ${finderQuestions.length}`;


        backButton.disabled =
            currentStep === 0;


        optionsElement.innerHTML = "";


        /* =====================================================
           PINCODE QUESTION
        ===================================================== */

        if (question.input) {

            const input =
                document.createElement("input");


            input.type = "text";

            input.inputMode = "numeric";

            input.maxLength = 6;

            input.placeholder =
                question.placeholder;

            input.className =
                "finder-input";


            input.value =
                answers.pincode;


            input.addEventListener(
                "input",
                function () {

                    input.value =
                        input.value.replace(
                            /\D/g,
                            ""
                        ).slice(0, 6);

                    answers.pincode =
                        input.value;

                }
            );


            optionsElement.appendChild(input);


            const nextButton =
                document.createElement("button");


            nextButton.type = "button";

            nextButton.className =
                "btn btn-primary finder-next";


            nextButton.textContent =
                "Continue →";


            nextButton.addEventListener(
                "click",
                function () {

                    if (
                        !/^\d{6}$/.test(
                            input.value.trim()
                        )
                    ) {

                        alert(
                            "Please enter a valid 6-digit pincode."
                        );

                        input.focus();

                        return;

                    }


                    nextStep();

                }
            );


            optionsElement.appendChild(
                nextButton
            );


            return;
        }


        /* =====================================================
           NORMAL OPTIONS
        ===================================================== */

        question.options.forEach(
            function (option, index) {

                const button =
                    document.createElement("button");


                button.type = "button";


                button.className =
                    "finder-option";


                button.innerHTML = `
                    <strong>${escapeHtml(option[0])}</strong>
                    <span>${escapeHtml(option[1])}</span>
                `;


                if (
                    question.multiple &&
                    Array.isArray(
                        answers.features
                    ) &&
                    answers.features.includes(index)
                ) {

                    button.classList.add(
                        "selected"
                    );

                }


                if (
                    !question.multiple &&
                    answers[
                        getAnswerKey(currentStep)
                    ] === index
                ) {

                    button.classList.add(
                        "selected"
                    );

                }


                button.addEventListener(
                    "click",
                    function () {


                        /* MULTIPLE */

                        if (question.multiple) {

                            const selected =
                                answers.features;


                            const position =
                                selected.indexOf(index);


                            if (
                                position === -1
                            ) {

                                selected.push(index);

                                button.classList.add(
                                    "selected"
                                );

                            } else {

                                selected.splice(
                                    position,
                                    1
                                );

                                button.classList.remove(
                                    "selected"
                                );

                            }


                            return;

                        }


                        /* SINGLE */

                        const answerKey =
                            getAnswerKey(
                                currentStep
                            );


                        answers[answerKey] =
                            index;


                        optionsElement
                            .querySelectorAll(
                                ".finder-option"
                            )
                            .forEach(
                                function (item) {

                                    item.classList.remove(
                                        "selected"
                                    );

                                }
                            );


                        button.classList.add(
                            "selected"
                        );


                        setTimeout(
                            nextStep,
                            250
                        );

                    }
                );


                optionsElement.appendChild(
                    button
                );

            }
        );

    }


    /* =========================================================
       ANSWER KEY
    ========================================================= */

    function getAnswerKey(step) {

        const keys = [
            "businessType",
            "monthlyVolume",
            "output",
            "paperSize",
            "speed",
            "features",
            "condition",
            "purchase",
            "budget",
            "pincode",
            "timeline"
        ];

        return keys[step];

    }


    /* =========================================================
       NEXT STEP
    ========================================================= */

    function nextStep() {

        if (
            currentStep <
            finderQuestions.length - 1
        ) {

            currentStep++;

            renderFinder();

        } else {

            showFinderLeadForm();

        }

    }


    /* =========================================================
       PREVIOUS STEP
    ========================================================= */

    function previousStep() {

        if (currentStep > 0) {

            currentStep--;

            renderFinder();

        }

    }


    backButton.addEventListener(
        "click",
        previousStep
    );


    /* =========================================================
       LEAD FORM
    ========================================================= */

    function showFinderLeadForm() {

        stepLabel.textContent =
            "ALMOST DONE";


        progressPercent.textContent =
            "100%";


        progressBar.style.width =
            "100%";


        questionElement.textContent =
            "Where should we send your recommendations?";


        optionsElement.innerHTML = `

            <div class="finder-lead-form">

                <p>
                    Enter your details and we'll show
                    you the machines that best match
                    your requirements.
                </p>

                <input
                    id="finder-name"
                    class="finder-input"
                    type="text"
                    placeholder="Your name"
                    autocomplete="name"
                >

                <input
                    id="finder-mobile"
                    class="finder-input"
                    type="tel"
                    inputmode="numeric"
                    maxlength="10"
                    placeholder="Mobile number"
                    autocomplete="tel"
                >

                <button
                    id="finder-submit"
                    class="btn btn-primary"
                    type="button"
                >
                    Show My Recommendations →
                </button>

            </div>

        `;


        currentElement.textContent =
            "RESULTS";


        backButton.disabled =
            false;


        const nameInput =
            document.getElementById(
                "finder-name"
            );


        const mobileInput =
            document.getElementById(
                "finder-mobile"
            );


        mobileInput.addEventListener(
            "input",
            function () {

                mobileInput.value =
                    mobileInput.value
                        .replace(
                            /\D/g,
                            ""
                        )
                        .slice(0, 10);

            }
        );


        document
            .getElementById("finder-submit")
            .addEventListener(
                "click",
                async function () {

                    const name =
                        nameInput.value.trim();


                    const mobile =
                        mobileInput.value.trim();


                    if (!name) {

                        alert(
                            "Please enter your name."
                        );

                        nameInput.focus();

                        return;

                    }


                    if (
                        !/^\d{10}$/.test(
                            mobile
                        )
                    ) {

                        alert(
                            "Please enter a valid 10-digit mobile number."
                        );

                        mobileInput.focus();

                        return;

                    }


                    answers.name =
                        name;


                    answers.mobile =
                        mobile;


                    const submitButton =
                        document.getElementById(
                            "finder-submit"
                        );


                    submitButton.disabled =
                        true;


                    submitButton.textContent =
                        "Finding Your Machines...";


                    await loadMachines();


                    showFinderResults();

                }
            );

    }


    /* =========================================================
       MACHINE CARD
    ========================================================= */

    function createMachineCard(
        machine,
        label,
        extraClass = ""
    ) {

        if (!machine) {

            return `
                <div class="finder-result-card finder-result-empty">
                    <span>${label}</span>
                    <h4>Talk to our expert</h4>
                    <p>
                        Our team can help you identify the
                        right machine for your requirement.
                    </p>

                    <div class="finder-result-actions">

                        <a
                            href="tel:+918553202432"
                            class="btn btn-primary"
                        >
                            Call Expert
                        </a>

                        <a
                            href="https://wa.me/918553202432"
                            target="_blank"
                            rel="noopener"
                            class="btn btn-outline"
                        >
                            WhatsApp
                        </a>

                    </div>

                </div>
            `;

        }


        const image =
            machine.image
                ? `
                    <img
                        src="${escapeHtml(machine.image)}"
                        alt="${escapeHtml(machine.title)}"
                        loading="lazy"
                    >
                  `
                : `
                    <div class="finder-result-image-placeholder">
                        Machine Image
                    </div>
                  `;


        const rental =
            machine.rental_month
                ? `Rental from ${escapeHtml(machine.rental_month)} / month`
                : "";


        const price =
            machine.sale_price
                ? `Sale: ${escapeHtml(machine.sale_price)}`
                : "";


        const details =
            [
                machine.brand,
                machine.model,
                machine.speed
                    ? `${machine.speed} PPM`
                    : "",
                machine.paper_size,
                machine.output
            ]
            .filter(Boolean)
            .join(" • ");


        return `

            <div class="finder-result-card ${extraClass}">

                <span>${escapeHtml(label)}</span>

                <div class="finder-result-machine-image">
                    ${image}
                </div>

                <small>
                    ${escapeHtml(details)}
                </small>

                <h4>
                    ${escapeHtml(machine.title)}
                </h4>

                ${
                    machine.category
                        ? `
                            <p>
                                ${escapeHtml(machine.category)}
                            </p>
                          `
                        : ""
                }

                ${
                    price
                        ? `
                            <strong>
                                ${price}
                            </strong>
                          `
                        : ""
                }

                ${
                    rental
                        ? `
                            <p>
                                ${rental}
                            </p>
                          `
                        : ""
                }

                <div class="finder-result-actions">

                    <a
                        href="${escapeHtml(machine.url)}"
                        class="btn btn-primary"
                    >
                        View Machine
                    </a>

                    <a
                        href="https://wa.me/918553202432?text=${encodeURIComponent(
                            "Hi AZ Office Automation, I am interested in " +
                            (machine.title || "this machine") +
                            ". Please share more details."
                        )}"
                        target="_blank"
                        rel="noopener"
                        class="btn btn-outline"
                    >
                        WhatsApp
                    </a>

                </div>

            </div>

        `;

    }


    /* =========================================================
       RESULTS
    ========================================================= */

    function showFinderResults() {

        const recommendations =
            findRecommendations();


        questionElement.textContent =
            "Your machine recommendations";


        stepLabel.textContent =
            "YOUR RESULTS";


        progressPercent.textContent =
            "100%";


        progressBar.style.width =
            "100%";


        currentElement.textContent =
            "DONE";


        backButton.disabled =
            false;


        /* NO MACHINES YET */

        if (
            !recommendations.best &&
            !recommendations.budget &&
            !recommendations.premium
        ) {

            optionsElement.innerHTML = `

                <div class="finder-no-results">

                    <span>
                        EXPERT ASSISTANCE
                    </span>

                    <h4>
                        Let's find the right machine for you.
                    </h4>

                    <p>
                        We don't have enough machine catalogue
                        data to generate an automatic recommendation
                        yet. Our team can help you choose the right
                        machine, rental or CPC option.
                    </p>

                    <div class="finder-result-actions">

                        <a
                            href="tel:+918553202432"
                            class="btn btn-primary"
                        >
                            Call Our Expert
                        </a>

                        <a
                            href="https://wa.me/918553202432?text=${encodeURIComponent(
                                "Hi AZ Office Automation, I completed the Machine Finder and would like help choosing a machine."
                            )}"
                            target="_blank"
                            rel="noopener"
                            class="btn btn-outline"
                        >
                            WhatsApp Us
                        </a>

                    </div>

                </div>

            `;

            return;

        }


        optionsElement.innerHTML = `

            <div class="finder-results">

                ${createMachineCard(
                    recommendations.best,
                    "BEST MATCH",
                    "finder-best-match"
                )}

                ${createMachineCard(
                    recommendations.budget,
                    "BUDGET OPTION",
                    "finder-budget-option"
                )}

                ${createMachineCard(
                    recommendations.premium,
                    "PREMIUM OPTION",
                    "finder-premium-option"
                )}

            </div>

        `;

    }


    /* =========================================================
       INITIALIZE
    ========================================================= */

    loadMachines();

    renderFinder();

});

/* =========================================================
   AZ OFFICE AUTOMATION
   PRODUCT IMAGE HD LIGHTBOX + ZOOM
========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    const productImages = document.querySelectorAll(
        '.machines-archive .machine-card-image img'
    );

    if (!productImages.length) {
        return;
    }


    /* =====================================================
       CREATE LIGHTBOX
    ===================================================== */

    const lightbox = document.createElement('div');

    lightbox.className = 'az-product-lightbox';

    lightbox.innerHTML = `
        <button
            type="button"
            class="az-product-lightbox-close"
            aria-label="Close image"
        >
            &times;
        </button>

        <div class="az-product-lightbox-content">
            <img
                class="az-product-lightbox-image"
                src=""
                alt=""
            >
        </div>

        <div class="az-product-lightbox-hint">
            Click image to zoom
        </div>
    `;

    document.body.appendChild(lightbox);


    const lightboxImage =
        lightbox.querySelector(
            '.az-product-lightbox-image'
        );

    const closeButton =
        lightbox.querySelector(
            '.az-product-lightbox-close'
        );


    /* =====================================================
       OPEN LIGHTBOX
    ===================================================== */

    productImages.forEach(function (image) {

        image.addEventListener('click', function (event) {

            /*
             * Stop the normal product-page link.
             */
            event.preventDefault();

            event.stopPropagation();


            /*
             * Use the original/high-resolution
             * WooCommerce image if available.
             */
            const highResolutionImage =
                image.getAttribute('data-large_image') ||
                image.getAttribute('data-src') ||
                image.currentSrc ||
                image.src;


            lightboxImage.src =
                highResolutionImage;

            lightboxImage.alt =
                image.alt || 'AZ Office Automation machine';


            /*
             * Reset zoom.
             */
            lightbox.classList.remove(
                'zoomed'
            );


            /*
             * Show lightbox.
             */
            lightbox.classList.add(
                'active'
            );


            /*
             * Prevent body scrolling.
             */
            document.body.classList.add(
                'az-lightbox-open'
            );

        });

    });


    /* =====================================================
       CLICK IMAGE = ZOOM / ZOOM OUT
    ===================================================== */

    lightboxImage.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            lightbox.classList.toggle(
                'zoomed'
            );

        }
    );


    /* =====================================================
       CLOSE BUTTON
    ===================================================== */

    closeButton.addEventListener(
        'click',
        function () {

            closeLightbox();

        }
    );


    /* =====================================================
       CLICK OUTSIDE IMAGE = CLOSE
    ===================================================== */

    lightbox.addEventListener(
        'click',
        function (event) {

            if (
                event.target === lightbox ||
                event.target.classList.contains(
                    'az-product-lightbox-content'
                )
            ) {

                closeLightbox();

            }

        }
    );


    /* =====================================================
       ESC KEY = CLOSE
    ===================================================== */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape' &&
                lightbox.classList.contains(
                    'active'
                )
            ) {

                closeLightbox();

            }

        }
    );


    /* =====================================================
       CLOSE FUNCTION
    ===================================================== */

    function closeLightbox() {

        lightbox.classList.remove(
            'active',
            'zoomed'
        );

        document.body.classList.remove(
            'az-lightbox-open'
        );

        /*
         * Clear image after animation.
         */
        setTimeout(function () {

            if (
                !lightbox.classList.contains(
                    'active'
                )
            ) {

                lightboxImage.src = '';

            }

        }, 300);

    }

});