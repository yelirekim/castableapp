//
//  CAConfig.m
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CAConfig.h"

@implementation CAConfig

- (NSURL *)apiURI {
    NSDictionary *contents = [[NSDictionary alloc]initWithContentsOfFile:[[NSBundle mainBundle] pathForResource:@"config"
                                                                                                         ofType:@"plist"]];
    return [NSURL URLWithString:[contents valueForKey:@"api-uri"]];
}

CA_SYNTHESIZE_SINGLETON(Config)

@end
