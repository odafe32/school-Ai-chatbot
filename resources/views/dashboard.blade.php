<x-app-layout>
    <style>
        .dashboard-wrapper {
            display: flex;
            flex-direction: column;
     
        }

        .dashboard-grid {
            display: grid;
            gap: 24px;
            grid-template-columns: 1fr;
        }

        .insight-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .dashboard-card {
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 20px;
            box-shadow: 0 18px 40px rgba(15, 118, 110, 0.08);
            padding: 28px;
        }

        .card-leading {
            display: flex;
            align-items: flex-start;
            gap: 18px;
        }

        .icon-badge {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: linear-gradient(135deg, #0ea5e9, #10b981);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.18);
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .card-body {
            margin-top: 10px;
            color: #4b5563;
            font-size: 15px;
            line-height: 1.6;
        }

        .feature-list {
            margin: 18px 0 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-size: 14px;
            color: #4b5563;
        }

        .feature-list li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .feature-list i {
            color: #10b981;
            font-size: 16px;
            margin-top: 3px;
        }

        .mini-card-grid {
            display: grid;
            gap: 14px;
            grid-template-columns: 1fr;
        }

        .mini-card {
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 16px;
            padding: 18px;
            display: flex;
            gap: 14px;
            align-items: center;
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.04);
        }

        .mini-card .badge {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .mini-card h4 {
            margin: 0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #64748b;
        }

        .mini-card p {
            margin: 4px 0 0;
            font-size: 15px;
            color: #1f2937;
            font-weight: 600;
        }

        .chat-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .chat-panel {
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 24px;
            box-shadow: 0 22px 50px rgba(4, 120, 87, 0.12);
            overflow: hidden;
        }

        .chat-panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            padding: 24px 28px;
            background: linear-gradient(135deg, #059669, #10b981);
            color: #ffffff;
        }

        .chat-panel-header h3 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
        }

        .chat-panel-header p {
            margin: 6px 0 0;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.78);
        }

        .chat-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.22);
            font-size: 12px;
            font-weight: 600;
        }

        .chat-frame {
            position: relative;
            height: 720px;
        }

        .chat-frame iframe {
            border: none;
            width: 100%;
            height: 100%;
        }

        .info-strip {
            display: grid;
            gap: 16px;
            grid-template-columns: 1fr;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 18px;
            padding: 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.05);
        }

        .info-card .badge {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .info-card h5 {
            margin: 0;
            font-size: 12px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #64748b;
        }

        .info-card p {
            margin: 4px 0 0;
            font-size: 15px;
            color: #1f2937;
            font-weight: 600;
        }

        @media (min-width: 768px) {
            .mini-card-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 2fr 3fr;
            }

            .info-strip {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }
    </style>



    <div class="dashboard-wrapper">
        <div class="dashboard-grid">
            <section class="insight-column" aria-labelledby="assistant-overview">
                <article class="dashboard-card">
                    <div class="card-leading">
                        <span class="icon-badge"><i class="fas fa-graduation-cap" aria-hidden="true"></i></span>
                        <div>
                            <h3 id="assistant-overview" class="card-title">Your digital NSUK companion</h3>
                            <p class="card-body">The assistant blends curated university knowledge with Chatbase AI so students, applicants, parents and staff get trustworthy answers on demand.</p>
                        </div>
                    </div>
                    <ul class="feature-list">
                        <li>
                            <i class="fas fa-bolt" aria-hidden="true"></i>
                            <span><strong>Smart replies:</strong> instant guidance on admissions, programmes, fees and campus services.</span>
                        </li>
                        <li>
                            <i class="fas fa-shield-heart" aria-hidden="true"></i>
                            <span><strong>Secure access:</strong> conversations stay private within the authenticated dashboard.</span>
                        </li>
                    </ul>
                </article>

                <div class="mini-card-grid">
                    <div class="mini-card">
                        <span class="badge"><i class="fas fa-lightbulb" aria-hidden="true"></i></span>
                        <div>
                            <h4>Quick tip</h4>
                            <p>Ask about application deadlines and upcoming events.</p>
                        </div>
                    </div>
                    <div class="mini-card">
                        <span class="badge"><i class="fas fa-headset" aria-hidden="true"></i></span>
                        <div>
                            <h4>Support</h4>
                            <p>ICT Service Desk — support@nsuk.edu.ng</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="chat-column" aria-labelledby="chat-section">
                <article class="chat-panel">
            
                    <div class="chat-frame">
                        <iframe
                            src="https://www.chatbase.co/chatbot-iframe/n0-Qe4suEVbJZBZYU4zG2"
                            title="NSUK AI Chatbot"
                            height="520"
                            allow="clipboard-write"
                        ></iframe>
                    </div>
                </article>

            </section>
        </div>
    </div>
</x-app-layout>
