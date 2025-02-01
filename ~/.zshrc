# Set ZSH theme
ZSH_THEME="powerlevel10k/powerlevel10k"

# Plugins
plugins=(
    git
    zsh-autosuggestions
    zsh-syntax-highlighting
    web-search
    copypath
    dirhistory
    history
    jsontools
    node
    npm
    vscode
)

# Additional settings for better autocompletion
autoload -U compinit && compinit
zstyle ':completion:*' menu select
zstyle ':completion:*' matcher-list 'm:{a-zA-Z}={A-Za-z}'

# Better history searching
bindkey '^[[A' history-substring-search-up
bindkey '^[[B' history-substring-search-down
