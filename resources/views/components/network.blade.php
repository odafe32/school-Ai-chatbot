<!-- Enhanced Network Status Notification -->
<div id="network-status" class="network-status">
    <div class="network-content">
        <div class="network-icon">
            <svg class="icon-online" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor"/>
            </svg>
            <svg class="icon-offline" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z" fill="currentColor"/>
            </svg>
            <div class="loading-spinner"></div>
        </div>
        <div class="network-text">
            <span class="status-text">Checking connection...</span>
            <span class="status-detail">Please wait</span>
        </div>
        <button class="close-btn" onclick="hideNetworkStatus()">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
    <div class="progress-bar"></div>
</div>

<style>
.network-status {
    position: fixed;
    top: -100px;
    left: 50%;
    transform: translateX(-50%);
    min-width: 320px;
    max-width: 90vw;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 0 0 16px 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 99999;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.network-status.show {
    top: 0;
    animation: slideDown 0.4s ease-out;
}

.network-status.online {
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
}

.network-status.offline {
    background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
}

.network-status.checking {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    color: #333;
}

.network-content {
    display: flex;
    align-items: center;
    padding: 16px 20px;
    gap: 12px;
    position: relative;
}

.network-icon {
    position: relative;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
}

.network-icon svg {
    position: absolute;
    width: 100%;
    height: 100%;
    transition: all 0.3s ease;
    opacity: 0;
    transform: scale(0.8);
}

.network-icon svg.active {
    opacity: 1;
    transform: scale(1);
}

.loading-spinner {
    position: absolute;
    width: 24px;
    height: 24px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.loading-spinner.active {
    opacity: 1;
}

.network-text {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.status-text {
    font-size: 16px;
    font-weight: 600;
    color: white;
    line-height: 1.2;
}

.status-detail {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.2;
}

.network-status.checking .status-text,
.network-status.checking .status-detail {
    color: #333;
}

.close-btn {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    opacity: 0.7;
}

.close-btn:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.1);
}

.close-btn svg {
    width: 16px;
    height: 16px;
}

.network-status.checking .close-btn {
    color: #333;
}

.progress-bar {
    height: 3px;
    background: rgba(255, 255, 255, 0.3);
    position: relative;
    overflow: hidden;
}

.progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    animation: shimmer 2s infinite;
}

.network-status.online .progress-bar::after {
    animation: none;
    left: 0;
    background: rgba(255, 255, 255, 0.4);
}

.network-status.offline .progress-bar::after {
    animation: pulse 1.5s infinite;
    background: rgba(255, 255, 255, 0.3);
}

@keyframes slideDown {
    from {
        transform: translateX(-50%) translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
    }
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}

@keyframes shimmer {
    to {
        left: 100%;
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 0.3;
    }
    50% {
        opacity: 0.7;
    }
}

/* Mobile responsiveness */
@media (max-width: 480px) {
    .network-status {
        min-width: 280px;
        left: 10px;
        right: 10px;
        transform: none;
        border-radius: 0 0 12px 12px;
    }
    
    .network-status.show {
        left: 10px;
        right: 10px;
    }
    
    .network-content {
        padding: 14px 16px;
    }
    
    .status-text {
        font-size: 14px;
    }
    
    .status-detail {
        font-size: 11px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const networkStatus = document.getElementById('network-status');
    const statusText = networkStatus.querySelector('.status-text');
    const statusDetail = networkStatus.querySelector('.status-detail');
    const onlineIcon = networkStatus.querySelector('.icon-online');
    const offlineIcon = networkStatus.querySelector('.icon-offline');
    const loadingSpinner = networkStatus.querySelector('.loading-spinner');
    
    let hideTimeout;
    let isManuallyHidden = false;

    function showStatus(isOnline, isInitial = false) {
        if (isManuallyHidden && !isInitial) return;
        
        clearTimeout(hideTimeout);
        
        // Show checking state first
        if (!isInitial) {
            networkStatus.className = 'network-status checking show';
            statusText.textContent = 'Checking connection...';
            statusDetail.textContent = 'Please wait';
            loadingSpinner.classList.add('active');
            onlineIcon.classList.remove('active');
            offlineIcon.classList.remove('active');
        }
        
        // After a brief delay, show the actual status
        setTimeout(() => {
            loadingSpinner.classList.remove('active');
            
            if (isOnline) {
                networkStatus.className = 'network-status online show';
                statusText.textContent = '🎉 Back Online!';
                statusDetail.textContent = 'All features are now available';
                onlineIcon.classList.add('active');
                offlineIcon.classList.remove('active');
                
                // Auto-hide after 3 seconds when online
                hideTimeout = setTimeout(() => {
                    if (!isManuallyHidden) {
                        hideNetworkStatus();
                    }
                }, 3000);
            } else {
                networkStatus.className = 'network-status offline show';
                statusText.textContent = '⚠️ You\'re Offline';
                statusDetail.textContent = 'Some features may not work';
                offlineIcon.classList.add('active');
                onlineIcon.classList.remove('active');
                
                // Don't auto-hide when offline - keep it visible
            }
        }, isInitial ? 0 : 800);
    }

    function hideNetworkStatus() {
        networkStatus.classList.remove('show');
        isManuallyHidden = true;
        
        // Reset manual hide after 10 seconds
        setTimeout(() => {
            isManuallyHidden = false;
        }, 10000);
    }

    // Make hideNetworkStatus globally available
    window.hideNetworkStatus = hideNetworkStatus;

    // Initial check
    if (!navigator.onLine) {
        showStatus(false, true);
    }

    // Network event listeners
    window.addEventListener('online', () => {
        showStatus(true);
    });
    
    window.addEventListener('offline', () => {
        showStatus(false);
    });

    // Additional connection quality check
    function checkConnectionQuality() {
        const startTime = Date.now();
        
        fetch('/favicon.ico?' + Math.random(), {
            method: 'HEAD',
            cache: 'no-cache'
        }).then(() => {
            const duration = Date.now() - startTime;
            if (duration > 3000) {
                // Slow connection
                if (networkStatus.classList.contains('online')) {
                    statusDetail.textContent = 'Connection is slow';
                }
            }
        }).catch(() => {
            // Connection failed
            if (navigator.onLine) {
                showStatus(false);
            }
        });
    }

    // Check connection quality every 30 seconds
    setInterval(checkConnectionQuality, 30000);
});
</script>