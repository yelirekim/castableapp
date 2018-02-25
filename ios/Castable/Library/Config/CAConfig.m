//
//  CAConfig.m
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CAConfig.h"

@interface CAConfig ()
@property (nonatomic, readonly) NSDictionary * config;
@end

@implementation CAConfig

- (NSDictionary *)config {
    if (_config == nil) {
        _config = [[NSDictionary alloc]initWithContentsOfFile:[[NSBundle mainBundle] pathForResource:@"config"
                                                                                              ofType:@"plist"]];
    }
    return _config;
}

- (NSURL *)apiURI {
    return [NSURL URLWithString:[self.config valueForKey:@"api-uri"]];
}

- (NSString *)apiKey {
    return [NSURL URLWithString:[self.config valueForKey:@"api-key"]];
}

CA_SYNTHESIZE_SINGLETON(Config)

@end
